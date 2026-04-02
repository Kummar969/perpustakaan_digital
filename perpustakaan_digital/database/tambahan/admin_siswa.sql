CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    nama VARCHAR(100)
);  

INSERT INTO admin (username, password, nama)
VALUES ('admin', MD5('admin123'), 'Admin Perpustakaan');

CREATE TABLE siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nisn VARCHAR(20) UNIQUE NOT NULL,
    nama VARCHAR(100) NOT NULL,
    kelas VARCHAR(20),
    password VARCHAR(255) NOT NULL
);

INSERT INTO siswa (nisn, nama, kelas, password)
VALUES 
('1234567890', 'Budi Santoso', 'XI RPL', MD5('12345')),
('9876543210', 'Siti Aisyah', 'X TKJ', MD5('12345'));