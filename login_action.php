<?php
session_start();
require_once 'koneksi/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    
    // Validasi input
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Email dan password harus diisi!";
        header("Location: Login.php");
        exit();
    }
    
    // Cari user berdasarkan email
    $sql = "SELECT id, full_name, email, password FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Login berhasil
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['success'] = "Login berhasil! Selamat datang, " . $user['full_name'];
            header("Location: home.php");
            exit();
        } else {
            $_SESSION['error'] = "Password salah!";
            header("Location: Login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Email tidak terdaftar!";
        header("Location: Login.php");
        exit();
    }
} else {
    header("Location: Login.php");
    exit();
}

mysqli_close($conn);
?>

