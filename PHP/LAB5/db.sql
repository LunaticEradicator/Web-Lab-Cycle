CREATE DATABASE IF NOT EXISTS dbLab5;
USE dbLab5;

CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    author VARCHAR(100),
    edition INT,
    publisher VARCHAR(100),
    releaseDate DATE
);


-- INSERT INTO books (title, author, edition, publisher, releaseDate)
-- VALUES
--     ('Blood of Elves', 'Andrzej Sapkowski', 1, 'SuperNowa', '2009-01-01'),
--     ('The Elder Scrolls: The Infernal City', 'Greg Keyes', 1, 'Del Rey', '2009-10-13'),
--     ('World of Warcraft: The Last Guardian', 'Jeff Grubb', 1, 'Penguin Group', '2002-08-01'),
--     ('Halo: The Fall of Reach', 'Eric Nylund', 1, 'Del Rey', '2001-10-30'),
--     ('The Witcher 3: Wild Hunt ', 'David S. J. Hodgson', 1, 'Piggyback', '2015-05-19');
