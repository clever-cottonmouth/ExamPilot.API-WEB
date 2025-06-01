-- ExamPilot Database Schema
-- Version: 1.0.0
-- Description: Database schema for the ExamPilot online examination system

-- Create database
CREATE DATABASE IF NOT EXISTS ExamPilotDb;
USE ExamPilotDb;

-- Users table
CREATE TABLE IF NOT EXISTS users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    college VARCHAR(100),
    role ENUM('admin', 'instructor', 'student') DEFAULT 'student',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP NULL,
    is_active BOOLEAN DEFAULT TRUE
);

-- Exams table
CREATE TABLE IF NOT EXISTS exams (
    exam_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    duration INT NOT NULL COMMENT 'Duration in minutes',
    total_marks INT NOT NULL,
    passing_marks INT NOT NULL,
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    start_time DATETIME,
    end_time DATETIME,
    is_active BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (created_by) REFERENCES users(user_id)
);

-- Questions table
CREATE TABLE IF NOT EXISTS questions (
    qid INT PRIMARY KEY AUTO_INCREMENT,
    exam_id INT,
    question TEXT NOT NULL,
    marks INT DEFAULT 1,
    question_type ENUM('multiple_choice', 'true_false', 'short_answer') DEFAULT 'multiple_choice',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (exam_id) REFERENCES exams(exam_id)
);

-- Answers table
CREATE TABLE IF NOT EXISTS answers (
    aid INT PRIMARY KEY AUTO_INCREMENT,
    qid INT,
    answer TEXT NOT NULL,
    is_correct BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (qid) REFERENCES questions(qid)
);

-- Student_Exams table (to track which students are enrolled in which exams)
CREATE TABLE IF NOT EXISTS student_exams (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    exam_id INT,
    status ENUM('not_started', 'in_progress', 'completed') DEFAULT 'not_started',
    score INT DEFAULT 0,
    start_time DATETIME,
    end_time DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (exam_id) REFERENCES exams(exam_id)
);

-- Student_Answers table (to store student responses)
CREATE TABLE IF NOT EXISTS student_answers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_exam_id INT,
    question_id INT,
    answer_id INT,
    student_response TEXT,
    is_correct BOOLEAN,
    marks_obtained INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_exam_id) REFERENCES student_exams(id),
    FOREIGN KEY (question_id) REFERENCES questions(qid),
    FOREIGN KEY (answer_id) REFERENCES answers(aid)
);

-- Insert default admin user
INSERT INTO users (username, email, password, role) 
VALUES ('admin', 'admin@exampilot.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

-- Create indexes for better performance
CREATE INDEX idx_questions_exam_id ON questions(exam_id);
CREATE INDEX idx_answers_qid ON answers(qid);
CREATE INDEX idx_student_exams_user_id ON student_exams(user_id);
CREATE INDEX idx_student_exams_exam_id ON student_exams(exam_id);
CREATE INDEX idx_student_answers_student_exam_id ON student_answers(student_exam_id); 