CREATE DATABASE nsbm_eventhub;
USE nsbm_eventhub;

CREATE TABLE users (
    user_id     INT AUTO_INCREMENT PRIMARY KEY,
    full_name   VARCHAR(100) NOT NULL,
    email       VARCHAR(100) NOT NULL,
    password    VARCHAR(255) NOT NULL,
    faculty     VARCHAR(100),
    role        VARCHAR(20)  DEFAULT 'student'
);


CREATE TABLE communities (
    community_id INT AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(100) NOT NULL,
    description  TEXT,
    faculty      VARCHAR(100)
);


CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(50) NOT NULL
);


CREATE TABLE events (
    event_id         INT AUTO_INCREMENT PRIMARY KEY,
    title            VARCHAR(150) NOT NULL,
    description      TEXT,
    community_id     INT,
    venue            VARCHAR(100) NOT NULL,
    start_time       DATETIME NOT NULL,
    banner_image_url VARCHAR(255)
);


CREATE TABLE event_categories (
    event_id    INT NOT NULL,
    category_id INT NOT NULL
);


CREATE TABLE event_registrations (
    registration_id INT AUTO_INCREMENT PRIMARY KEY,
    event_id        INT NOT NULL,
    user_id         INT NOT NULL,
    student_name    VARCHAR(100),
    student_email   VARCHAR(100),
    faculty         VARCHAR(100),
    contact_number  VARCHAR(20),
    student_id      VARCHAR(50),
    batch           VARCHAR(50),
    academic_year   VARCHAR(20),
    status          VARCHAR(20) DEFAULT 'registered'
);


CREATE TABLE announcements (
    announcement_id INT AUTO_INCREMENT PRIMARY KEY,
    title           VARCHAR(150) NOT NULL,
    message         TEXT NOT NULL,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);