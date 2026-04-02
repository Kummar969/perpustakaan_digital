CREATE DATABASE perpustakaan;
USE perpustakaan;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    username VARCHAR(50),
    password VARCHAR(255),
    role ENUM('admin','siswa') DEFAULT 'siswa'
);

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(200),
    penulis VARCHAR(100),
    kategori VARCHAR(100),
    stok INT DEFAULT 0
);

CREATE TABLE borrowings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    book_id INT,
    tanggal_pinjam DATE,
    tanggal_kembali DATE,
    status VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (book_id) REFERENCES books(id)
);