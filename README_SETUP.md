# Setup Database dan Sistem Login/Register

## Cara Setup Database

### Opsi 1: Menggunakan install_database.php (Paling Mudah)
1. Buka browser dan akses: `http://localhost/LuminaProject/install_database.php`
2. File ini akan otomatis membuat database dan tabel
3. Setelah selesai, **hapus file install_database.php** untuk keamanan

### Opsi 2: Menggunakan phpMyAdmin
1. Buka phpMyAdmin di browser
2. Pilih database `lumina_project` (atau buat baru jika belum ada)
3. Klik tab "SQL"
4. Copy semua isi dari file `koneksi/database.sql`
5. Paste ke textarea SQL
6. Klik "Go" untuk menjalankan

### Opsi 3: Menggunakan Command Line
```bash
mysql -u root -p < koneksi/database.sql
```

## Struktur Database

Database: `lumina_project`
Tabel: `users`

**Kolom tabel users:**
- id (INT, AUTO_INCREMENT, PRIMARY KEY)
- full_name (VARCHAR 100)
- email (VARCHAR 100, UNIQUE)
- password (VARCHAR 255) - di-hash dengan password_hash()
- mobile (VARCHAR 20)
- birth_date (DATE)
- gender (ENUM: 'male', 'female', 'preferNotToSay')
- address (TEXT)
- country (VARCHAR 100)
- postal_code (VARCHAR 10)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)

## File-file yang Terlibat

1. **koneksi/koneksi.php** - File koneksi database
2. **Login.php** - Halaman login dan register (dengan tab)
3. **register.php** - Handler untuk proses registrasi
4. **login_action.php** - Handler untuk proses login
5. **logout.php** - Handler untuk logout
6. **koneksi/database.sql** - File SQL untuk membuat database dan tabel

## Cara Menggunakan

1. **Registrasi:**
   - Buka `Login.php`
   - Klik tab "REGISTER"
   - Isi semua field
   - Password minimal 6 karakter
   - Format tanggal: mm-dd-yyyy (contoh: 12-25-1990)
   - Klik "Register"

2. **Login:**
   - Buka `Login.php`
   - Klik tab "LOGIN" (default)
   - Masukkan email dan password
   - Klik "Login"
   - Setelah login berhasil, akan redirect ke `home.php`

## Konfigurasi Koneksi Database

Jika perlu mengubah konfigurasi database, edit file `koneksi/koneksi.php`:

```php
$host = "localhost";
$username = "root";
$password = "";
$database = "lumina_project";
```

## Keamanan

- Password di-hash menggunakan `password_hash()` dengan algoritma default (bcrypt)
- Input user di-escape menggunakan `mysqli_real_escape_string()` untuk mencegah SQL injection
- Email divalidasi menggunakan `filter_var()`
- Session digunakan untuk menyimpan data user yang login

## Catatan

- Pastikan MySQL/MariaDB sudah berjalan
- Pastikan PHP extension `mysqli` sudah aktif
- Setelah setup selesai, hapus file `install_database.php` untuk keamanan

