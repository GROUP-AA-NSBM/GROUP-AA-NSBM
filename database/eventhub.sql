CREATE DATABASE nsbm_eventhub;
USE nsbm_eventhub;
-- NSBM Event Hub Database Schema
-- To import into phpMyAdmin on live hosting:
-- 1. Create a database in your hosting control panel.
-- 2. Select your newly created database in phpMyAdmin.
-- 3. Click Import and select this file.

CREATE TABLE users (
CREATE TABLE IF NOT EXISTS users (
    user_id     INT AUTO_INCREMENT PRIMARY KEY,
    full_name   VARCHAR(100) NOT NULL,
    email       VARCHAR(100) NOT NULL,
    password    VARCHAR(255) NOT NULL,
    role        VARCHAR(20)  DEFAULT 'student'
);


CREATE TABLE communities (
CREATE TABLE IF NOT EXISTS communities (
    community_id INT AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(100) NOT NULL,
    description  TEXT,
    faculty      VARCHAR(100)
);


CREATE TABLE categories (
CREATE TABLE IF NOT EXISTS categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(50) NOT NULL
);


CREATE TABLE events (
CREATE TABLE IF NOT EXISTS events (
    event_id         INT AUTO_INCREMENT PRIMARY KEY,
    title            VARCHAR(150) NOT NULL,
    description      TEXT,
    category_id      INT,
    community_id     INT,
    venue            VARCHAR(100) NOT NULL,
    start_time       DATETIME NOT NULL,
    banner_image_url VARCHAR(255),
    created_by       INT
);


CREATE TABLE event_registrations (
CREATE TABLE IF NOT EXISTS event_registrations (
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

-- Default Admin User (Password: admin123)
INSERT INTO users (full_name, email, password, role) 
VALUES ('NSBM IT Department', 'admin@nsbm.ac.lk', 'admin123', 'admin')
ON DUPLICATE KEY UPDATE user_id = user_id;

-- Sample Categories
INSERT INTO categories (name) VALUES 
('Technology & Computing'),
('Business & Leadership'),
('Sports & Athletics'),
('Arts & Culture')
ON DUPLICATE KEY UPDATE category_id = category_id;

-- Sample Communities
INSERT INTO communities (name, faculty, description) VALUES 
('FOSS Community', 'Faculty of Computing', 'Free and Open Source Software Community of NSBM'),
('Rotaract Club of NSBM', 'General', 'Community youth and leadership service club'),
('IEEE Student Branch', 'Faculty of Computing', 'Engineering and technology community')
ON DUPLICATE KEY UPDATE community_id = community_id;