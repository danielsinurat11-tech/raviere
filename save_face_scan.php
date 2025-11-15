<?php
session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/koneksi/koneksi.php';

try {
	$raw = file_get_contents('php://input');
	$payload = json_decode($raw, true);
	if (!$payload || empty($payload['imageData'])) {
		echo json_encode(['success' => false, 'message' => 'No image data']);
		exit;
	}

	// Ensure table exists
	$createSql = "CREATE TABLE IF NOT EXISTS face_scans (
		id INT AUTO_INCREMENT PRIMARY KEY,
		user_id INT NULL,
		image_path VARCHAR(255) NOT NULL,
		created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		INDEX (user_id)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
	mysqli_query($conn, $createSql);

	// Prepare upload directory
	$uploadDir = __DIR__ . '/uploads/face_scans';
	if (!is_dir($uploadDir)) {
		@mkdir($uploadDir, 0775, true);
	}
	if (!is_dir($uploadDir) || !is_writable($uploadDir)) {
		echo json_encode(['success' => false, 'message' => 'Upload directory not writable']);
		exit;
	}

	// Decode base64 image (data URL)
	$imageData = $payload['imageData'];
	if (strpos($imageData, 'data:image') !== 0) {
		echo json_encode(['success' => false, 'message' => 'Invalid data URL']);
		exit;
	}
	list($meta, $content) = explode(',', $imageData, 2);
	$ext = 'jpg';
	if (preg_match('/data:image\/(\w+);base64/', $meta, $m)) {
		$ext = strtolower($m[1]);
		if (!in_array($ext, ['jpg','jpeg','png'])) { $ext = 'jpg'; }
	}
	$binary = base64_decode($content);
	if ($binary === false) {
		echo json_encode(['success' => false, 'message' => 'Failed to decode image']);
		exit;
	}

	$filename = 'face_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
	$filepath = $uploadDir . '/' . $filename;
	if (file_put_contents($filepath, $binary) === false) {
		echo json_encode(['success' => false, 'message' => 'Failed to write file']);
		exit;
	}

	// Save record to DB
	$userId = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : null;
	$dbPath = 'uploads/face_scans/' . $filename; // relative path for web
	$stmt = mysqli_prepare($conn, "INSERT INTO face_scans (user_id, image_path) VALUES (?, ?)");
	if ($stmt) {
		mysqli_stmt_bind_param($stmt, 'is', $userId, $dbPath);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}

	echo json_encode(['success' => true, 'path' => $dbPath]);
} catch (Throwable $e) {
	echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
