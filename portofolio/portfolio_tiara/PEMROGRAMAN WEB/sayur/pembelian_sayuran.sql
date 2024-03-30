CREATE DATABASE IF NOT EXISTS pembelian_sayuran;
USE pembelian_sayuran;

CREATE TABLE IF NOT EXISTS sayuran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_sayuran VARCHAR(50) NOT NULL,
    harga DECIMAL(10,2) NOT NULL,
    stok INT NOT NULL
);
