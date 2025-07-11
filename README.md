# Trainer Timetable App with Calendar View

## 1. Project Title & Description

**Project Title:** Trainer Timetable App with Calendar View

**Description:** The Trainer Timetable App is a web-based application designed to streamline the management of trainer schedules and sessions. It provides a comprehensive platform for both trainers and administrators to organize, track, and monitor training activities efficiently. The application features a calendar view for session visualization, detailed trainer profiles, and robust administrative tools for managing trainers and sessions.

## 2. Team Details

**Team Name:** [Your Team Name Here]

**Team Members:**
*   Ajit Appaji Gawade - ajitgawade09987@gmail.com
*   Supriya Raju More - supriyarajumore@gmail.com

## 3. Tech Stack

*   **Languages:** PHP, HTML, CSS, JavaScript
*   **Database:** MySQL
*   **Server Environment:** Apache (via XAMPP)
*   **Other Tools/Libraries:** [Mention any specific JavaScript libraries, CSS frameworks (e.g., Bootstrap), or other tools if used. If none, you can remove this line or state "None specific beyond core languages."]

## 4. Project Description

The Trainer Timetable App is built to simplify the complex task of managing trainer schedules and training sessions. It offers a dual-dashboard system, catering to the specific needs of trainers and administrators.

**Key Features:**

*   **User Authentication:** Secure sign-up and sign-in processes for trainers and administrators.
*   **Trainer Dashboard:**
    *   **Trainer Profile:** Allows trainers to view and manage their contact information, languages, certifications, and availability.
    *   **Session Calendar:** Provides a visual calendar displaying all scheduled sessions with details like name, date, location, and time.
    *   **Upcoming Sessions:** Lists all future training sessions, including their dates and times.
    *   **Session Status:** Tracks the completion status of sessions (completed/not completed).
*   **Admin Dashboard:**
    *   **Trainer Details:** Comprehensive view of all registered trainers, including their contact information, languages, certifications, and availability. Includes options to edit or delete trainer profiles.
    *   **Add Session:** Functionality for administrators to create and schedule new training sessions.
    *   **Add Trainer:** Allows administrators to register new trainers directly.
    *   **Statistics:** Provides an overview of key metrics such as total trainers, total sessions, active trainers today, and inactive trainers.

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
    *   Copy all your project files (HTML, CSS, JavaScript, PHP, database scripts, etc.) into this `trainer_timetable` folder.

4.  **Database Setup:**
    *   Open your web browser and go to `http://localhost/phpmyadmin`.
    *   Create a new database (e.g., `trainer_timetable_db`).
    *   Import your database schema (SQL file) into this newly created database. You should have a `.sql` file in your project directory. If not, you'll need to manually create the tables and insert any initial data.

## 6. Usage Guide

1.  **Access the Application:**
    *   Open your web browser.
    *   Type `http://localhost/trainer_timetable/login.html` (replace `trainer_timetable` with your actual project folder name if different) in the address bar and press Enter.
    *   The login page will be displayed.

2.  **Trainer Module:**
    *   **Sign Up (First Time Trainer):**
        *   Click on the "Sign Up" link.
        *   Enter your email and password.
        *   Click "Sign Up" to create your account. You will be redirected to the login page upon successful registration.
    *   **Sign In (Existing Trainer):**
        *   Enter your registered email and password.
        *   Click "Sign In".
        *   You will be redirected to the Trainer Dashboard.
    *   **Trainer Dashboard Sections:**
        *   **Trainer Profile:** View and update your contact information (email, number), languages (e.g., C++, Python, Java, PHP, MySQL), certifications (e.g., Certified Web Stack Trainer), and availability (e.g., Monday - Friday).
        *   **Session Calendar:** See your scheduled sessions displayed on a calendar, including session name, date, location, and time.
        *   **Upcoming Sessions:** A list of your upcoming training sessions with their respective dates and times.
        *   **Session Status:** Check the status of your sessions, indicating which are completed and which are not.
    *   **Logout:** Click the "Logout" button to exit the trainer dashboard.

3.  **Admin Module:**
    *   **Admin Login:**
        *   On the login page, enter the administrator's email and password.
        *   Click "Sign In".
        *   You will be redirected to the Admin Dashboard.
    *   **Admin Dashboard Sections:**
        *   **Trainer Details:** View a table of all trainers, including their name, phone, languages, certifications, availability.
            *   **Actions:** Use the "Edit" button to modify a trainer's details or the "Delete" button to remove a trainer from the system.
        *   **Add Session:** A form to add new training sessions to the system.
        *   **Add Trainer:** A form to register new trainers directly into the system.
        *   **Statistics:** Displays key metrics such as the total number of trainers, total sessions, active trainers today, and inactive trainers.

*(Optional: Add screenshots or GIFs here to illustrate the usage flow.)*

## 7. API Endpoints / Architecture

The application follows a client-server architecture, with the frontend (HTML, CSS, JavaScript) interacting with the backend (PHP) to manage data stored in a MySQL database.

**Key Modules:**

*   **Frontend (Client-Side):**
    *   `login.html`: User authentication interface.
    *   `signup.html`: Trainer registration interface.
    *   `trainer_dashboard.html`: Trainer's main interface.
    *   `admin_dashboard.html`: Administrator's main interface.
    *   CSS files for styling.
    *   JavaScript files for client-side validation, dynamic content updates, and calendar interactions.

*   **Backend (Server-Side - PHP):**
    *   `db_config.php` (or similar): Handles database connection and configuration.
    *   `auth.php` (or similar): Manages user (trainer/admin) authentication (login, signup).
    *   `trainer_api.php` (or similar): Handles requests related to trainer profiles, sessions, and status.
    *   `admin_api.php` (or similar): Manages requests for trainer details (add, edit, delete), session management (add), and statistics.

**Example API Endpoints (Conceptual):**

*   **`POST /api/signup`**: Trainer registration.
*   **`POST /api/login`**: User login (trainer/admin).
*   **`GET /api/trainer/profile`**: Retrieve trainer profile details.
*   **`PUT /api/trainer/profile`**: Update trainer profile.
*   **`GET /api/trainer/sessions/calendar`**: Fetch all sessions for calendar view.
*   **`GET /api/trainer/sessions/upcoming`**: Retrieve upcoming sessions for a trainer.
*   **`GET /api/trainer/sessions/status`**: Get session completion status.
*   **`GET /api/admin/trainers`**: Retrieve all trainer details (for admin).
*   **`POST /api/admin/trainer`**: Add a new trainer (for admin).
*   **`PUT /api/admin/trainer/{id}`**: Edit trainer details (for admin).
*   **`DELETE /api/admin/trainer/{id}`**: Delete a trainer (for admin).
*   **`POST /api/admin/session`**: Add a new session (for admin).
*   **`GET /api/admin/statistics`**: Get overall statistics (for admin).

## 8. License

This project is released under the [MIT License](LICENSE). You are free to use, modify, and distribute this software, provided that the original copyright and license notice are included in all copies or substantial portions of the software.

*(If you are using a different license, replace "MIT License" and update the description accordingly. If you don't want to specify a license, you can remove this section.)*
