-- Membuat database (jika belum ada)
CREATE DATABASE IF NOT EXISTS lumina_project CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Menggunakan database
USE lumina_project;

-- Membuat tabel users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    mobile VARCHAR(20) NOT NULL,
    birth_date DATE NOT NULL,
    gender ENUM('male', 'female', 'preferNotToSay') NOT NULL,
    address TEXT NOT NULL,
    country VARCHAR(100) NOT NULL,
    postal_code VARCHAR(10) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Jika tabel sudah ada, update kolom postal_code menjadi nullable
ALTER TABLE users MODIFY COLUMN postal_code VARCHAR(10) NULL;

