CREATE DATABASE IF NOT EXISTS nsbm_eventhub;
USE nsbm_eventhub;

CREATE TABLE users (
    user_id         INT AUTO_INCREMENT PRIMARY KEY,
    full_name       VARCHAR(100) NOT NULL,
    email           VARCHAR(150) NOT NULL UNIQUE,
    password        VARCHAR(255) NOT NULL,
    faculty         VARCHAR(100),
    profile_pic_url VARCHAR(255),
    bio             VARCHAR(500),
    role            ENUM('student', 'admin') NOT NULL DEFAULT 'student',
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT chk_email_domain CHECK (email LIKE '%@students.nsbm.ac.lk' OR email LIKE '%@nsbm.ac.lk')
);

CREATE TABLE login_tokens (
    token_id    INT AUTO_INCREMENT PRIMARY KEY,
    user_id     INT NOT NULL,
    token_hash  VARCHAR(255) NOT NULL,
    expires_at  TIMESTAMP NOT NULL,
    used        BOOLEAN DEFAULT FALSE,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE communities (
    community_id INT AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(100) NOT NULL UNIQUE,
    description  VARCHAR(500),
    logo_url     VARCHAR(255),
    faculty      VARCHAR(100),
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE community_followers (
    user_id      INT NOT NULL,
    community_id INT NOT NULL,
    followed_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id, community_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (community_id) REFERENCES communities(community_id) ON DELETE CASCADE
);

CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(50) NOT NULL UNIQUE,
    icon        VARCHAR(50)
);

CREATE TABLE events (
    event_id               INT AUTO_INCREMENT PRIMARY KEY,
    title                  VARCHAR(150) NOT NULL,
    description            TEXT,
    community_id           INT,
    venue                  VARCHAR(150) NOT NULL,
    start_time             DATETIME NOT NULL,
    end_time               DATETIME,
    registration_deadline  DATETIME,
    capacity               INT,
    banner_image_url       VARCHAR(255),
    status                 ENUM('draft', 'published', 'cancelled', 'completed')
                               NOT NULL DEFAULT 'published',
    created_by             INT,
    created_at             TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at             TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (community_id) REFERENCES communities(community_id) ON DELETE SET NULL,
    FOREIGN KEY (created_by) REFERENCES users(user_id) ON DELETE SET NULL
);

CREATE INDEX idx_events_start_time ON events(start_time);

CREATE TABLE event_categories (
    event_id    INT NOT NULL,
    category_id INT NOT NULL,
    PRIMARY KEY (event_id, category_id),
    FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE CASCADE
);

CREATE TABLE event_registrations (
    registration_id INT AUTO_INCREMENT PRIMARY KEY,
    event_id        INT NOT NULL,
    user_id         INT NOT NULL,
    student_name    VARCHAR(100),
    student_email   VARCHAR(150),
    contact_number  VARCHAR(20),
    student_id      VARCHAR(50),
    batch           VARCHAR(50),
    academic_year   VARCHAR(20),
    status          ENUM('registered', 'waitlisted', 'cancelled', 'attended')
                        NOT NULL DEFAULT 'registered',
    registered_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (event_id, user_id),
    FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE announcements (
    announcement_id INT AUTO_INCREMENT PRIMARY KEY,
    community_id    INT,
    event_id        INT,
    title           VARCHAR(150) NOT NULL,
    message         TEXT NOT NULL,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (community_id) REFERENCES communities(community_id) ON DELETE CASCADE,
    FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE
);

INSERT INTO users (full_name, email, password, faculty, role) VALUES 
('System Admin', 'admin@nsbm.ac.lk', '$2y$12$DoE8KINrGxOPLe8auSr48e/MeDPJEUdDD0A6idMDiiMIFy/Q7uppK', 'Administration', 'admin'),
('John Doe', 'johndoe@students.nsbm.ac.lk', '$2y$12$f0OEbvQMUkbGZ91WxV4J5OK4dakLiZTub0mHi7D0MLpSO3H5ozAsK', 'Computing', 'student');

INSERT INTO categories (name, icon) VALUES 
('Computing & IT', 'laptop'),
('Business & Management', 'briefcase'),
('Sports & Athletics', 'trophy'),
('Cultural & Music', 'music');

INSERT INTO communities (name, description, faculty) VALUES 
('IEEE Student Branch', 'IEEE Student Branch of NSBM Green University', 'Computing'),
('Rotaract Club', 'Rotaract Club of NSBM', 'University Wide'),
('Marketing Circle', 'Student Marketing Association', 'Business'),
('Software Engineering Society', 'SES NSBM', 'Computing');

INSERT INTO events (title, description, community_id, venue, start_time, end_time, banner_image_url, status, created_by) VALUES 
('NSBM Tech Fiesta 2026', 'Annual flagship tech event featuring hackathons, project showcases, and tech talks.', 1, 'Auditorium', '2026-10-15 09:00:00', '2026-10-15 17:00:00', 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800', 'published', 1),
('Annual Sports Meet', 'Inter-faculty sports competitions and athletics meet.', 2, 'Main Ground', '2026-11-02 08:00:00', '2026-11-02 18:00:00', 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=800', 'published', 1),
('Business Leader Summit', 'Keynote speeches and networking sessions with corporate leaders.', 3, 'Hall B', '2026-12-10 10:30:00', '2026-12-10 16:00:00', 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800', 'published', 1);

INSERT INTO event_categories (event_id, category_id) VALUES 
(1, 1),
(2, 3),
(3, 2);

INSERT INTO announcements (title, message) VALUES 
('Registration open for Tech Fiesta 2026', 'All students can now register for the upcoming Tech Fiesta hackathon tracks.'),
('Annual Sports Meet practice schedule updated', 'Practice sessions at the main ground will begin next week.');