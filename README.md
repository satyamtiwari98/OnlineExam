# Online Exam System

This is an Online Exam System built with PHP and MySQL.

## Features

- User authentication: login and registration functionality for students and administrators.
- Admin panel: manage users, exams, questions, and results.
- Take exams: students can take exams with multiple-choice questions.
- View results: students can view their exam results after completing exams.

## Technologies Used

- PHP: Server-side scripting language
- MySQL: Relational database management system
- HTML/CSS: Frontend for the user interface
- Bootstrap: Frontend framework for responsive design
- jQuery: JavaScript library for frontend interactivity

## Installation

1. Clone the repository:

```bash
git clone https://github.com/satyamtiwari/onlineExam.git

```

2. Set up the database:

- Create a MySQL database named online_exam.
- Import the SQL file database.sql located in the sql directory into the database.

3. Configure database connection:

- Open the config.php file located in the includes directory.
- Update the database connection details (DB_HOST, DB_USER, DB_PASS, DB_NAME) with your MySQL credentials.

4. Run the application:

- Place the project files in your web server's document root directory (e.g., htdocs for XAMPP).
- Access the application in your web browser.

## Usage
- Access the application at http://localhost/online-exam-system in your web browser.
- Use the provided admin credentials to log in to the admin panel.
- Create exams, questions, and manage users from the admin panel.
- Students can register, log in, take exams, and view their results.


