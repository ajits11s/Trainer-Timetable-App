# Trainer Timetable App with Calendar View

## 1. Project Title & Description

**Project Title:** Trainer Timetable App with Calendar View

**Description:** This application provides a comprehensive solution for managing trainer schedules and sessions, featuring a calendar-based interface for easy visualization. It includes separate dashboards for trainers and administrators, allowing trainers to manage their profiles and view their upcoming sessions, while administrators can oversee all trainer details, add new sessions and trainers, and generate reports.

## 2. Team Details

**Team Name:** CodePair

**Team Members:**
*   Ajit Gawade - ajitgawade09987@gmail.com
*   Supriya More - supriyarajumore@gmail.com

## 3. Tech Stack

*   **Languages:**
    *   PHP
    *   HTML
    *   CSS
    *   JavaScript
*   **Database:** MySQL
*   **Server Environment:** Apache (via XAMPP)
*   **Tools & Technologies:**
    *   VS Code
    *   phpMyAdmin
    *   Git

## 4. Project Description

The Trainer Timetable App is designed to streamline the management of trainer schedules and training sessions. It offers two distinct user interfaces: a Trainer Dashboard and an Admin Dashboard, each tailored to the specific needs of its users.

**Trainer Dashboard:**
*   **Trainer Profile:** Displays detailed trainer information including contact details (email, phone), languages (e.g., C, C++, Python, Java, PHP, MySQL), certifications (e.g., Certified Web Stack Trainer), and availability (e.g., Monday - Friday).
*   **Session Calendar:** Provides a visual representation of the trainer's sessions, showing session names, dates, locations, and times in a calendar format.
*   **Upcoming Sessions:** Lists all future sessions assigned to the trainer, along with their respective dates and times.
*   **Session Status:** Shows the completion status of sessions, indicating which sessions are completed and which are pending.

**Admin Dashboard:**
*   **Trainer Details:** Displays a comprehensive list of all trainers, including their name, phone, languages, certifications, and actions (edit/delete). This section also allows for exporting trainer details to Excel and PDF formats.
*   **Add Session:** Enables administrators to create and add new training sessions to the system.
*   **Add Trainer:** Allows administrators to register new trainers into the system.
*   **Statistics:** Provides an overview of key metrics, such as total trainers, total sessions, active trainers today, and inactive trainers.

## 5. Setup Instructions

To set up and run the Trainer Timetable App locally, follow these steps:

1.  **Install XAMPP:** If you don't already have XAMPP installed, download and install it from the official Apache Friends website ([https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html)).

2.  **Start Apache and MySQL:**
    *   Open the XAMPP Control Panel.
    *   Click the "Start" button next to "Apache" to start the web server.
    *   Click the "Start" button next to "MySQL" to start the database server.

3.  **Place Project Files:**
    *   Navigate to the `htdocs` directory within your XAMPP installation (e.g., `C:\xampp\htdocs` on Windows).
    *   Create a new folder named `trainer_timetable` (or your preferred project name) inside `htdocs`.
    *   Copy all the project files into this newly created `trainer_timetable` folder.

4.  **Create Database:**
    *   Open your web browser and go to `http://localhost/phpmyadmin`.
    *   In phpMyAdmin, click on the "Databases" tab.
    *   Enter a name for your database (e.g., `trainer_timetable_db`) and click "Create".
    *   Import your database schema (SQL file) into the newly created database. (You will need to provide the SQL file for database creation).

5.  **Configure Database Connection:**
    *   Locate the database connection file in your project (e.g., `config.php` or `db_connection.php`).
    *   Open this file and update the database credentials (database name, username, password) to match your MySQL setup (default XAMPP: username `root`, no password).

## 6. Usage Guide

1.  **Access the Application:**
    *   Open your web browser.
    *   Type `http://localhost/trainer_timetable/login.html` (replace `trainer_timetable` with your actual project folder name if different) in the address bar and press Enter.

2.  **Trainer Module:**
    *   **Sign Up (First-time Trainer):**
        *   On the login page, click the "Sign Up" link.
        *   Enter your email address and a password.
        *   Click "Sign Up" to create your account. You will be redirected to the login page upon successful registration.
    *   **Sign In (Existing Trainer):**
        *   On the login page, enter your registered email and password.
        *   Click "Sign In".
        *   Upon successful login, you will be directed to the **Trainer Dashboard**.
    *   **Trainer Dashboard Sections:**
        *   **Trainer Profile:** View and update your contact information, languages, certifications, and availability.
        *   **Session Calendar:** See your scheduled sessions visually on a calendar.
        *   **Upcoming Sessions:** Check details of your upcoming training sessions.
        *   **Session Status:** Monitor the completion status of your past sessions.
    *   **Logout:** Click the "Logout" button (usually found in the navigation or profile section) to exit the trainer dashboard.

3.  **Admin Module:**
    *   **Admin Login:**
        *   On the login page, enter the administrator's email and password.
        *   Click "Sign In".
        *   Upon successful login, you will be directed to the **Admin Dashboard**.
    *   **Admin Dashboard Sections:**
        *   **Trainer Details:**
            *   View a table of all registered trainers with their details.
            *   Use the "Edit" action to modify a trainer's information.
            *   Use the "Delete" action to remove a trainer from the system.
            *   Click "Export to Excel" to download trainer data in Excel format.
            *   Click "Export to PDF" to download trainer data in PDF format.
        *   **Add Session:** Fill out the form to add new training sessions.
        *   **Add Trainer:** Fill out the form to register new trainers.
        *   **Statistics:** View real-time statistics on total trainers, total sessions, active trainers today, and inactive trainers.
    *   **Logout:** Click the "Logout" button to exit the admin dashboard.

4.  **Screenshot:**

   *   **Sign In And Sign Up:**
1.  **Sign in:**
![image alt](https://github.com/ajits11s/Trainer-Timetable-App/blob/615c141773ac07046ca42e0402e992306752e311/Screenshot/login1.jpg)
2.  **Sign up:**
![image alt](https://github.com/ajits11s/Trainer-Timetable-App/blob/615c141773ac07046ca42e0402e992306752e311/Screenshot/login2.jpg)

   *   **Trainer Dashboard:**
1.  **Trainer Profile:**
![image alt](https://github.com/ajits11s/Trainer-Timetable-App/blob/02ed8f151097b4ec15fe9e6c6bda413b6a8cb27d/Screenshot/trainer1.jpg)
2.  **Session Calendar:**
![image alt](https://github.com/ajits11s/Trainer-Timetable-App/blob/02ed8f151097b4ec15fe9e6c6bda413b6a8cb27d/Screenshot/trainer2.jpg)
3.  **Upcoming Sessions:**
![image alt](https://github.com/ajits11s/Trainer-Timetable-App/blob/02ed8f151097b4ec15fe9e6c6bda413b6a8cb27d/Screenshot/trainer3.jpg)
4.  **Session Status:**
![image alt](https://github.com/ajits11s/Trainer-Timetable-App/blob/02ed8f151097b4ec15fe9e6c6bda413b6a8cb27d/Screenshot/trainer4.jpg)

   *   **Admin Dashboard:**
1.  **Trainer Details:**
![image alt](https://github.com/ajits11s/Trainer-Timetable-App/blob/615c141773ac07046ca42e0402e992306752e311/Screenshot/admin1.jpg)
2.  **Add Session:**
![image alt](https://github.com/ajits11s/Trainer-Timetable-App/blob/615c141773ac07046ca42e0402e992306752e311/Screenshot/admin2.jpg)
3.  **Add Trainer:**
![image alt](https://github.com/ajits11s/Trainer-Timetable-App/blob/615c141773ac07046ca42e0402e992306752e311/Screenshot/admin3.jpg)
4.  **Stastics:**
![image alt](https://github.com/ajits11s/Trainer-Timetable-App/blob/615c141773ac07046ca42e0402e992306752e311/Screenshot/admin4.jpg)
   *   **Database:**
1.  **member:**
![image alt](https://github.com/ajits11s/Trainer-Timetable-App/blob/615c141773ac07046ca42e0402e992306752e311/Screenshot/data.jpg)
2.  **trainer_utilization:**
![image alt](https://github.com/ajits11s/Trainer-Timetable-App/blob/615c141773ac07046ca42e0402e992306752e311/Screenshot/data1.jpg)

## 7. API Endpoints / Architecture

The application follows a client-server architecture, with the frontend (HTML, CSS, JavaScript) interacting with the backend (PHP) to manage data stored in a MySQL database.

**Key Modules:**

*   **Authentication Module:** Handles user registration (for trainers) and login for both trainers and administrators.
*   **Trainer Management Module:** Manages trainer profiles, including viewing, editing, and deleting trainer information (Admin side).
*   **Session Management Module:** Allows for adding, viewing, and tracking the status of training sessions.
*   **Reporting Module:** Generates Excel and PDF reports of trainer details.

**Conceptual Data Flow:**

1.  **User Interaction:** User interacts with HTML forms and buttons in the browser.
2.  **Frontend Logic (JavaScript):** Handles client-side validation and AJAX requests to the backend.
3.  **Backend Processing (PHP):**
    *   Receives requests from the frontend.
    *   Processes business logic (e.g., authentication, data manipulation).
    *   Interacts with the MySQL database.
    *   Returns data or status messages to the frontend.
4.  **Database (MySQL):** Stores all application data, including user credentials, trainer profiles, and session details.

**Example (Conceptual) Endpoints:**

*   `login.php`: Handles user authentication.
*   `signup.php`: Handles new trainer registration.
*   `trainer_profile.php`: Manages trainer profile data.
*   `sessions.php`: Manages session data (add, view, update status).
*   `admin_trainers.php`: Manages trainer details for admin (view, edit, delete).
*   `export_excel.php`: Generates Excel reports.
*   `export_pdf.php`: Generates PDF reports.
