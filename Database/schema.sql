DROP DATABASE IF EXISTS hogwarts;
CREATE DATABASE hogwarts;
USE hogwarts;

-- Houses Table
CREATE TABLE houses
(
    id     INT PRIMARY KEY AUTO_INCREMENT,
    name   ENUM ('Gryffindor', 'Slytherin', 'Ravenclaw', 'Hufflepuff') UNIQUE NOT NULL,
    points INT DEFAULT 0
);

-- Wands Table
CREATE TABLE wands
(
    id          INT PRIMARY KEY AUTO_INCREMENT,
    name        VARCHAR(100)                               NOT NULL,
    magic_power INT                                        NOT NULL,
    wood        ENUM ('Holly', 'Yew', 'Elder', 'Willow', 'Hawthorn', 'Oak',
        'Maple', 'Ash', 'Cherry', 'Birch', 'Walnut', 'Poplar',
        'Rowan', 'Cedar', 'Hazel', 'Sycamore', 'Blackthorn',
        'Alder', 'Pine', 'Spruce')                         NOT NULL,
    core        ENUM ('Phoenix Feather', 'Dragon Heartstring', 'Unicorn Hair',
        'Thestral Tail Hair', 'Basilisk Horn', 'Veela Hair',
        'Thunderbird Tail Feather', 'Leprechaun Hair',
        'Kelpie Hair', 'Rougarou Hair', 'Wampus Cat Hair') NOT NULL,
    photo       VARCHAR(255)                               DEFAULT 'defaultWand.png'
);

-- Students Table
CREATE TABLE students
(
    id             INT PRIMARY KEY AUTO_INCREMENT,
    name           VARCHAR(100)        NOT NULL,
    email          VARCHAR(255) UNIQUE NOT NULL,
    password       VARCHAR(255)        NOT NULL,
    house_id       INT,
    wand_id        INT,
    balance        INT                 NOT NULL DEFAULT 1000,
    profilePicture VARCHAR(255)                 DEFAULT 'default.png',
    status         ENUM ('active', 'inactive')  DEFAULT 'active',
    created_at     TIMESTAMP                    DEFAULT CURRENT_TIMESTAMP,
    updated_at     TIMESTAMP                    DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (house_id) REFERENCES houses (id) ON DELETE SET NULL,
    FOREIGN KEY (wand_id) REFERENCES wands (id) ON DELETE SET NULL
);


-- Professors Table
CREATE TABLE professors
(
    id             INT PRIMARY KEY AUTO_INCREMENT,
    name           VARCHAR(100)        NOT NULL,
    email          VARCHAR(255) UNIQUE NOT NULL,
    profilePicture VARCHAR(255)                   DEFAULT 'default.png',
    password       VARCHAR(255)        NOT NULL,
    role           ENUM ('Professor', 'Chairman') DEFAULT 'Professor'
);

-- Courses Table (Dynamic Courses)
CREATE TABLE courses
(
    id           INT PRIMARY KEY AUTO_INCREMENT,
    name         VARCHAR(100) UNIQUE NOT NULL,
    description  TEXT                NOT NULL,
    professor_id INT                 NOT NULL,
    FOREIGN KEY (professor_id) REFERENCES professors (id) ON DELETE CASCADE
);

-- Student Enrollment Table
CREATE TABLE enrollments
(
    id         INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    course_id  INT NOT NULL,
    status     ENUM ('Enrolled', 'Completed') DEFAULT 'Enrolled',
    grade      INT                            DEFAULT NULL,
    FOREIGN KEY (student_id) REFERENCES students (id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses (id) ON DELETE CASCADE
);

-- Quizzes Table
DROP TABLE IF EXISTS quizzes;
CREATE TABLE quizzes
(
    id           INT PRIMARY KEY AUTO_INCREMENT,
    course_id    INT     NOT NULL,
    professor_id INT     NOT NULL,
    question     TEXT    NOT NULL,
    answer       BOOLEAN NOT NULL,
    points       INT DEFAULT 5, -- Bonus Points for Correct Answer
    FOREIGN KEY (course_id) REFERENCES courses (id) ON DELETE CASCADE,
    FOREIGN KEY (professor_id) REFERENCES professors (id) ON DELETE CASCADE
);

-- Student Quiz Attempts Table
DROP TABLE IF EXISTS student_quiz_attempts;
CREATE TABLE student_quiz_attempts
(
    id               INT PRIMARY KEY AUTO_INCREMENT,
    student_id       INT     NOT NULL,
    quiz_id          INT     NOT NULL,
    submitted_answer BOOLEAN NOT NULL,
    earned_points    INT DEFAULT 0,
    FOREIGN KEY (student_id) REFERENCES students (id) ON DELETE CASCADE,
    FOREIGN KEY (quiz_id) REFERENCES quizzes (id) ON DELETE CASCADE
);


-- Owl Messaging System
CREATE TABLE messages
(
    id          INT PRIMARY KEY AUTO_INCREMENT,
    sender_id   INT  NOT NULL,
    receiver_id INT  NOT NULL,
    message     TEXT NOT NULL,
    sent_at     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES students (id) ON DELETE CASCADE,
    FOREIGN KEY (receiver_id) REFERENCES students (id) ON DELETE CASCADE
);

-- Diagon Alley Shop (Magical Items)
CREATE TABLE shop_items
(
    id         INT PRIMARY KEY AUTO_INCREMENT,
    name       VARCHAR(100) UNIQUE                               NOT NULL,
    image_path VARCHAR(100) UNIQUE DEFAULT NULL,
    category   ENUM ('Broom', 'Potion Ingredient', 'Spell Book') NOT NULL,
    price      INT                                               NOT NULL
);

-- Student Inventory (Purchased Items)
CREATE TABLE student_inventory
(
    id           INT PRIMARY KEY AUTO_INCREMENT,
    student_id   INT NOT NULL,
    item_id      INT NOT NULL,
    purchased_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students (id) ON DELETE CASCADE,
    FOREIGN KEY (item_id) REFERENCES shop_items (id) ON DELETE CASCADE
);


INSERT INTO houses (name)
VALUES ('Gryffindor'),
       ('Slytherin'),
       ('Ravenclaw'),
       ('Hufflepuff');


INSERT INTO wands (name, magic_power, wood, core, photo)
VALUES ('Flamecaster', 95, 'Holly', 'Phoenix Feather', 'wand1.png'),
       ('Shadowfang', 90, 'Yew', 'Dragon Heartstring', 'wand1.png'),
       ('Eldermight', 99, 'Elder', 'Unicorn Hair', 'wand1.png'),
       ('Moonwhisper', 85, 'Willow', 'Thestral Tail Hair', 'wand1.png'),
       ('Stormbinder', 88, 'Hawthorn', 'Phoenix Feather', 'wand1.png'),
       ('Oakvenom', 92, 'Oak', 'Dragon Heartstring', 'wand2.png'),
       ('Inferno Branch', 87, 'Maple', 'Phoenix Feather', 'wand2.png'),
       ('Silverstrider', 82, 'Ash', 'Unicorn Hair', 'wand2.png'),
       ('Venomfang', 96, 'Cherry', 'Basilisk Horn', 'wand2.png'),
       ('Charmweaver', 80, 'Birch', 'Veela Hair', 'wand2.png'),
       ('Firebrand', 89, 'Walnut', 'Dragon Heartstring', 'wand3.png'),
       ('Blazebeak', 84, 'Poplar', 'Phoenix Feather', 'wand3.png'),
       ('Stormhowler', 97, 'Rowan', 'Thunderbird Tail Feather', 'wand3.png'),
       ('Emerald Whisper', 75, 'Cedar', 'Leprechaun Hair', 'wand3.png'),
       ('Wavebinder', 83, 'Hazel', 'Kelpie Hair', 'wand3.png'),
       ('Wildflame', 90, 'Sycamore', 'Rougarou Hair', 'wand3.png'),
       ('Tempestcaller', 94, 'Blackthorn', 'Thunderbird Tail Feather', 'wand4.png'),
       ('Poisonfang', 98, 'Alder', 'Basilisk Horn', 'wand4.png'),
       ('Aurora Shroud', 78, 'Pine', 'Veela Hair', 'wand5.png'),
       ('Beastbane', 91, 'Spruce', 'Wampus Cat Hair', 'wand6.png');
       
INSERT INTO shop_items (name, image_path, category, price) VALUES
		('Witch Broom', 'witch_broom.jpeg', 'Broom', 100),
        ('Plants Broom', 'plants_broom.jpeg', 'Broom', 300),
        ('Basic Broom', 'basic_broom.jpeg', 'Broom', 50),
        ('Gryffindor Broom 👑', 'gryffindor_broom.jpeg', 'Broom', 1000),
        ('Bats Broom', 'bats_broom.jpeg', 'Broom', 500),
        ('No Sleep Potion', 'nosleep_potion.jpeg', 'Potion Ingredient', '250'),
        ('Submit Task Before Deadline Potion', 'deadlines.jpeg', 'Potion Ingredient', '10000'),
        ('Basic Spell Book', 'basic_spell_book.jpeg', 'Spell Book', '50'),
        ('Dark Magic (php)', 'php.jpeg', 'Spell Book', '500');

INSERT INTO professors (name, email, password, role) VALUES ('Albus Dumbledore', 'dambldore@hogwarts.edu', '$2y$10$acehqg9h2EbE.LcoMpEp7OV6cOxfPXfYGIZzT9pmuznucSMMVbcj6',
                                                             'Chairman');