
DROP DATABASE IF EXISTS hogwarts;
CREATE DATABASE hogwarts;
USE hogwarts;

-- Houses Table
CREATE TABLE houses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name ENUM('Gryffindor', 'Slytherin', 'Ravenclaw', 'Hufflepuff') UNIQUE NOT NULL,
    points INT DEFAULT 0
);

-- Wands Table
CREATE TABLE wands (
    id INT PRIMARY KEY AUTO_INCREMENT,
    wood ENUM('Holly', 'Yew', 'Elder', 'Willow', 'Hawthorn', 'Oak') NOT NULL,
    core ENUM('Phoenix Feather', 'Dragon Heartstring', 'Unicorn Hair', 'Thestral Tail Hair') NOT NULL
);

-- Students Table
CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    house_id INT,
    wand_id INT,
    balance INT NOT NULL DEFAULT 1000,
    profilePicture VARCHAR(255) DEFAULT 'default.png',
    status ENUM ('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (house_id) REFERENCES houses(id) ON DELETE SET NULL,
    FOREIGN KEY (wand_id) REFERENCES wands(id) ON DELETE SET NULL
);



-- Professors Table
CREATE TABLE professors (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    profilePicture VARCHAR(255) DEFAULT 'default.png',
    password VARCHAR(255) NOT NULL,
    role ENUM('Professor', 'Chairman') DEFAULT 'Professor'
);

-- Courses Table (Dynamic Courses)
CREATE TABLE courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) UNIQUE NOT NULL,
    description TEXT NOT NULL,
    professor_id INT NOT NULL,
    FOREIGN KEY (professor_id) REFERENCES professors(id) ON DELETE CASCADE
);

-- Student Enrollment Table
CREATE TABLE enrollments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    status ENUM('Enrolled', 'Completed') DEFAULT 'Enrolled',
    grade INT DEFAULT NULL,
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

-- Quizzes Table
DROP TABLE IF EXISTS quizzes;
CREATE TABLE quizzes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    course_id INT NOT NULL,
    professor_id INT NOT NULL,
    question TEXT NOT NULL,
    answer BOOLEAN NOT NULL,
    points INT DEFAULT 5, -- Bonus Points for Correct Answer
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    FOREIGN KEY (professor_id) REFERENCES professors(id) ON DELETE CASCADE
);

-- Student Quiz Attempts Table
DROP TABLE IF EXISTS student_quiz_attempts;
CREATE TABLE student_quiz_attempts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    quiz_id INT NOT NULL,
    submitted_answer BOOLEAN NOT NULL,
    earned_points INT DEFAULT 0,
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id) ON DELETE CASCADE
);


-- Owl Messaging System
CREATE TABLE messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    sender_id INT NOT NULL,
    receiver_id INT NOT NULL,
    message TEXT NOT NULL,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (receiver_id) REFERENCES students(id) ON DELETE CASCADE
);

-- Diagon Alley Shop (Magical Items)
CREATE TABLE shop_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) UNIQUE NOT NULL,
    image_path VARCHAR(100) UNIQUE DEFAULT NULL,
    category ENUM('Broom', 'Potion Ingredient', 'Spell Book') NOT NULL,
    price INT NOT NULL
);

-- Student Inventory (Purchased Items)
CREATE TABLE student_inventory (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    item_id INT NOT NULL,
    purchased_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (item_id) REFERENCES shop_items(id) ON DELETE CASCADE
);


INSERT INTO houses (name) VALUES ('Gryffindor'), ('Slytherin'), ('Ravenclaw'), ('Hufflepuff');

INSERT INTO wands (wood, core) VALUES
('Holly', 'Phoenix Feather'),
('Yew', 'Dragon Heartstring'),
('Elder', 'Unicorn Hair'),
('Willow', 'Thestral Tail Hair'),
('Hawthorn', 'Phoenix Feather'),
('Oak', 'Dragon Heartstring');
