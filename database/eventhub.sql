CREATE DATABASE IF NOT EXISTS nsbm_eventhub;
USE nsbm_eventhub;

-- ============================================================
-- USERS
-- Students + the single admin. Email restricted to nsbm.ac.lk
-- ============================================================
CREATE TABLE users (
    user_id         INT AUTO_INCREMENT PRIMARY KEY,
    full_name       VARCHAR(100) NOT NULL,
    email           VARCHAR(150) NOT NULL UNIQUE,
    faculty         VARCHAR(100),
    profile_pic_url VARCHAR(255),
    bio             VARCHAR(500),
    role            ENUM('student', 'admin') NOT NULL DEFAULT 'student',
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT chk_email_domain CHECK (email LIKE '%@nsbm.ac.lk')
);

-- ============================================================
-- LOGIN TOKENS
-- Passwordless magic-link / OTP auth. Store a HASH of the
-- token, never the raw value. Short expiry (10-15 min typical).
-- ============================================================
CREATE TABLE login_tokens (
    token_id    INT AUTO_INCREMENT PRIMARY KEY,
    user_id     INT NOT NULL,
    token_hash  VARCHAR(255) NOT NULL,
    expires_at  TIMESTAMP NOT NULL,
    used        BOOLEAN DEFAULT FALSE,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- ============================================================
-- COMMUNITIES
-- e.g. AIESEC, Hackathon Club. faculty is optional/nullable —
-- not every community belongs to one faculty.
-- ============================================================
CREATE TABLE communities (
    community_id INT AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(100) NOT NULL UNIQUE,
    description  VARCHAR(500),
    logo_url     VARCHAR(255),
    faculty      VARCHAR(100),
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================================
-- COMMUNITY_FOLLOWERS  (users <-> communities, many-to-many)
-- ============================================================
CREATE TABLE community_followers (
    user_id      INT NOT NULL,
    community_id INT NOT NULL,
    followed_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id, community_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (community_id) REFERENCES communities(community_id) ON DELETE CASCADE
);

-- ============================================================
-- CATEGORIES
-- Interest-based (Tech, Business, Arts & Culture, Food & Drinks...)
-- kept separate from faculty so cross-faculty discovery works.
-- ============================================================
CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(50) NOT NULL UNIQUE,
    icon        VARCHAR(50)
);

-- ============================================================
-- EVENTS
-- community_id is nullable -> supports university-wide events
-- with no organizing club (e.g. admin-run orientation day).
-- ============================================================
CREATE TABLE events (
    event_id               INT AUTO_INCREMENT PRIMARY KEY,
    title                  VARCHAR(150) NOT NULL,
    description            TEXT,
    community_id           INT,
    venue                  VARCHAR(150) NOT NULL,
    start_time             DATETIME NOT NULL,
    end_time               DATETIME NOT NULL,
    registration_deadline  DATETIME,
    capacity               INT,
    banner_image_url       VARCHAR(255),
    status                 ENUM('draft', 'published', 'cancelled', 'completed')
                               NOT NULL DEFAULT 'draft',
    created_by             INT NOT NULL,
    created_at             TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at             TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (community_id) REFERENCES communities(community_id) ON DELETE SET NULL,
    FOREIGN KEY (created_by) REFERENCES users(user_id) ON DELETE RESTRICT,
    CONSTRAINT chk_event_times CHECK (end_time > start_time)
);

-- Indexed since the calendar view, "upcoming events", and personal
-- schedule all filter/sort by date constantly.
CREATE INDEX idx_events_start_time ON events(start_time);

-- ============================================================
-- EVENT_CATEGORIES  (events <-> categories, many-to-many)
-- e.g. a hackathon can be tagged both "Tech" and "Career"
-- ============================================================
CREATE TABLE event_categories (
    event_id    INT NOT NULL,
    category_id INT NOT NULL,
    PRIMARY KEY (event_id, category_id),
    FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE CASCADE
);

-- ============================================================
-- EVENT_REGISTRATIONS  (users <-> events, many-to-many)
-- Powers "register for events", "view personal schedule",
-- "view registrations" and "generate participant lists".
-- ============================================================
CREATE TABLE event_registrations (
    registration_id INT AUTO_INCREMENT PRIMARY KEY,
    event_id        INT NOT NULL,
    user_id         INT NOT NULL,
    status          ENUM('registered', 'waitlisted', 'cancelled', 'attended')
                        NOT NULL DEFAULT 'registered',
    registered_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (event_id, user_id),  -- a user can only register once per event
    FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- ============================================================
-- ANNOUNCEMENTS
-- Tied to a community (so followers get notified) and
-- optionally to one specific event.
-- ============================================================
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