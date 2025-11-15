<?php
/**
 * File untuk install database lumina_project
 * Jalankan file ini sekali untuk membuat database dan tabel
 * Setelah selesai, hapus file ini untuk keamanan
 */

// Koneksi ke MySQL (tanpa database)
$host = "localhost";
$username = "root";
$password = "";

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "<h2>Instalasi Database Lumina Project</h2>";
echo "<hr>";

// Membaca file SQL
$sql_file = 'koneksi/database.sql';
if (!file_exists($sql_file)) {
    die("File database.sql tidak ditemukan!");
}

$sql_content = file_get_contents($sql_file);

// Memecah query berdasarkan semicolon
$queries = array_filter(array_map('trim', explode(';', $sql_content)));

$success_count = 0;
$error_count = 0;

foreach ($queries as $query) {
    if (empty($query)) {
        continue;
    }
    
    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        $success_count++;
        echo "<p style='color: green;'>✓ Query berhasil: " . substr($query, 0, 50) . "...</p>";
    } else {
        $error_count++;
        $error = mysqli_error($conn);
        // Skip error jika database/tabel sudah ada
        if (strpos($error, 'already exists') !== false || strpos($error, 'Duplicate') !== false) {
            echo "<p style='color: orange;'>⚠ " . $error . "</p>";
        } else {
            echo "<p style='color: red;'>✗ Error: " . $error . "</p>";
        }
    }
}

echo "<hr>";
echo "<h3>Hasil Instalasi:</h3>";
echo "<p>Query berhasil: <strong>$success_count</strong></p>";
echo "<p>Query error: <strong>$error_count</strong></p>";

// Test koneksi ke database
$database = "lumina_project";
$conn_db = mysqli_connect($host, $username, $password, $database);

if ($conn_db) {
    echo "<p style='color: green;'><strong>✓ Database 'lumina_project' berhasil dibuat dan siap digunakan!</strong></p>";
    
    // Cek apakah tabel users ada
    $check_table = "SHOW TABLES LIKE 'users'";
    $result = mysqli_query($conn_db, $check_table);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<p style='color: green;'>✓ Tabel 'users' berhasil dibuat!</p>";
    } else {
        echo "<p style='color: red;'>✗ Tabel 'users' tidak ditemukan!</p>";
    }
    
    mysqli_close($conn_db);
} else {
    echo "<p style='color: red;'>✗ Gagal terhubung ke database 'lumina_project'</p>";
}

mysqli_close($conn);

echo "<hr>";
echo "<p><strong>Catatan:</strong> Setelah instalasi selesai, hapus file install_database.php untuk keamanan.</p>";
echo "<p><a href='Login.php'>Kembali ke Halaman Login</a></p>";
?>

