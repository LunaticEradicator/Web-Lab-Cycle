CREATE DATABASE IF NOT EXISTS dbLab4;
USE dbLab4;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    anime VARCHAR(100),
    studio VARCHAR(100),
    author VARCHAR(100),
    releaseDate DATE,
    rating INT
);


-- INSERT INTO users (anime, studio, author, releaseDate, rating) VALUES 
-- ('Demon Slayer', 'Ufotable', 'Koyoharu Gotouge', '2019-04-06', 8.8),
-- ('Dragon Ball Z', 'Toei Animation', 'Akira Toriyama', '1989-04-26', 8);

