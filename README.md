# ExamPilot - Online Examination System

A modern web-based examination platform that enables educational institutions to conduct online tests efficiently. The system provides a seamless experience for administrators, instructors, and students.

## Features

- **User Authentication**
  - Separate login portals for administrators, instructors, and students
  - Secure session management
  - User registration system

- **Exam Management**
  - Create and schedule exams
  - Add and modify questions
  - Set time limits and scoring rules
  - Real-time exam monitoring

- **Student Features**
  - Take exams in a controlled environment
  - Immediate result feedback
  - View exam history and scores
  - User-friendly interface

- **Administrative Tools**
  - Comprehensive dashboard
  - User management
  - Exam analytics
  - Result management

## Technology Stack

- **Frontend**
  - HTML5
  - CSS3
  - JavaScript
  - Responsive design

- **Backend**
  - PHP
  - MySQL Database

## Project Structure

```
ExamPilot/
├── src/                    # Source code
│   ├── controllers/        # PHP controllers
│   ├── models/            # Database models
│   ├── views/             # View templates
│   ├── config/            # Configuration files
│   ├── includes/          # Common includes
│   ├── utils/             # Utility functions
│   └── public/            # Public assets
│       ├── css/           # Stylesheets
│       ├── js/            # JavaScript files
│       └── images/        # Image resources
├── tests/                 # Test files
├── docs/                  # Documentation
├── CHANGELOG.md           # Version history
├── LICENSE               # License information
└── README.md             # Project documentation
```

## Database

The system uses MySQL database with the following structure:

### Tables

1. **users**
   - User authentication and profiles
   - Role-based access (admin, instructor, student)
   - College affiliation tracking

2. **exams**
   - Exam details and configuration
   - Duration and scoring parameters
   - Scheduling information

3. **questions**
   - Question content and types
   - Multiple choice, true/false, short answer support
   - Marks allocation

4. **answers**
   - Answer options for questions
   - Correct answer marking
   - Question association

5. **student_exams**
   - Exam enrollment tracking
   - Progress monitoring
   - Score recording

6. **student_answers**
   - Student response storage
   - Answer validation
   - Score calculation

### Setup

1. Create a MySQL database named `ExamPilotDb`
2. Import the database schema from `docs/database.sql`
3. Configure database connection in `src/config/config.php`:
   ```php
   $servername = "localhost";
   $username = "your_username";
   $password = "your_password";
   $dbname = "ExamPilotDb";
   ```

### Default Admin Account
- Username: admin
- Email: admin@exampilot.com
- Password: password (hashed in database)

### Database Features
- Proper foreign key constraints
- Indexed fields for better performance
- Timestamp tracking for all records
- Role-based access control
- Comprehensive exam and result tracking

## Screenshots

<img src="https://github.com/mirajhad/Online-Examination-System/blob/master/images1/home.png" alt="Home Page">
<img src="https://github.com/mirajhad/Online-Examination-System/blob/master/images1/user.png" alt="User Interface">
<img src="https://github.com/mirajhad/Online-Examination-System/blob/master/images1/send.png" alt="Submission">
<img src="https://github.com/mirajhad/Online-Examination-System/blob/master/images1/1.png" alt="Dashboard">

## Contributors




