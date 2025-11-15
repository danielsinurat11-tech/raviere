<?php
session_start();
require_once 'koneksi/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $full_name = mysqli_real_escape_string($conn, $_POST['fullName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $birth_date = mysqli_real_escape_string($conn, $_POST['birthDate']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    
    // Validasi input
    if (empty($full_name) || empty($email) || empty($password) || empty($mobile) || 
        empty($birth_date) || empty($gender) || empty($address) || empty($country)) {
        $_SESSION['error'] = "Semua field harus diisi!";
        header("Location: Login.php");
        exit();
    }
    
    // Validasi password minimal 6 karakter
    if (strlen($password) < 6) {
        $_SESSION['error'] = "Password minimal 6 karakter!";
        header("Location: Login.php");
        exit();
    }
    
    // Validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Format email tidak valid!";
        header("Location: Login.php");
        exit();
    }
    
    // Cek apakah email sudah terdaftar
    $check_email = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email);
    
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error'] = "Email sudah terdaftar! Silakan gunakan email lain atau login.";
        header("Location: Login.php");
        exit();
    }
    
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Format tanggal sudah dalam format yyyy-mm-dd dari input type="date"
    $birth_date_formatted = $birth_date;
    
    // Insert data ke database
    $sql = "INSERT INTO users (full_name, email, password, mobile, birth_date, gender, address, country) 
            VALUES ('$full_name', '$email', '$hashed_password', '$mobile', '$birth_date_formatted', '$gender', '$address', '$country')";
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Registrasi berhasil! Silakan login dengan email dan password Anda.";
        header("Location: Login.php");
        exit();
    } else {
        $_SESSION['error'] = "Error: " . mysqli_error($conn);
        header("Location: Login.php");
        exit();
    }
} else {
    header("Location: Login.php");
    exit();
}

mysqli_close($conn);
?>

