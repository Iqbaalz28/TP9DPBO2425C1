-- Create database
CREATE DATABASE IF NOT EXISTS mvp_db;
USE mvp_db;

-- Create table pembalap
CREATE TABLE IF NOT EXISTS pembalap (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    tim VARCHAR(255) NOT NULL,
    negara VARCHAR(255) NOT NULL,
    poinMusim INT DEFAULT 0,
    jumlahMenang INT DEFAULT 0
);

-- Create table sirkuit
CREATE TABLE IF NOT EXISTS sirkuit (
    id INT AUTO_INCREMENT PRIMARY KEY, -- ID unik untuk sirkuit
    nama VARCHAR(255) NOT NULL,        -- Nama sirkuit (misal: Silverstone)
    negara VARCHAR(255) NOT NULL,      -- Negara lokasi sirkuit
    panjang_km FLOAT NOT NULL,         -- Panjang lintasan dalam KM
    tipe_lintasan VARCHAR(100)         -- Tipe (misal: Street Circuit, Race Track)
);

-- Data dummy untuk Pembalap
INSERT INTO pembalap (nama, tim, negara, poinMusim, jumlahMenang) VALUES
('Lewis Hamilton', 'Mercedes', 'United Kingdom', 347, 11),
('Max Verstappen', 'Red Bull', 'Netherlands', 335, 10),
('Valtteri Bottas', 'Mercedes', 'Finland', 203, 2),
('Sergio Perez', 'Red Bull', 'Mexico', 190, 1),
('Carlos Sainz', 'Ferrari', 'Spain', 150, 0),
('Daniel Ricciardo', 'McLaren', 'Australia', 115, 1),
('Charles Leclerc', 'Ferrari', 'Monaco', 95, 0),
('Lando Norris', 'McLaren', 'United Kingdom', 88, 0),
('Pierre Gasly', 'AlphaTauri', 'France', 75, 0),
('Fernando Alonso', 'Alpine', 'Spain', 65, 0);

-- Data dummy untuk Sirkuit
INSERT INTO sirkuit (nama, negara, panjang_km, tipe_lintasan) VALUES
('Silverstone', 'UK', 5.89, 'Race Track'),
('Monaco Grand Prix', 'Monaco', 3.33, 'Street Circuit');