
# CARE - Hospital Management System

![Repo Size](https://img.shields.io/github/repo-size/fatima-897/CARE?style=for-the-badge)  
![Languages](https://img.shields.io/github/languages/count/fatima-897/CARE?style=for-the-badge)  
![Top Language](https://img.shields.io/github/languages/top/fatima-897/CARE?style=for-the-badge)  
![Last Commit](https://img.shields.io/github/last-commit/fatima-897/CARE?style=for-the-badge)  
![Issues](https://img.shields.io/github/issues/fatima-897/CARE?style=for-the-badge)  
![License](https://img.shields.io/badge/license-Educational-blue?style=for-the-badge)  
![Status](https://img.shields.io/badge/status-Active-brightgreen?style=for-the-badge)  

> 🚀 *A web-based Hospital Management System designed for efficient hospital operations with role-based dashboards for Admins, Doctors, and Patients.*

---

## 📜 Table of Contents

- [Project Overview](#-project-overview)
- [Features](#-features)
- [Technologies Used](#-technologies-used)
- [Folder Structure](#-folder-structure)
- [Installation Guide (Local)](#-installation-guide-local)
- [Deployment on Cloud](#-deployment-on-cloud)
- [Login Credentials](#-login-credentials-sample)
- [Usage](#-usage)
- [Screenshots](#-screenshots)
- [Troubleshooting](#-troubleshooting)
- [Contributing](#-contributing)
- [License](#-license)

---

## 🏥 Project Overview

**CARE** is a web-based Hospital Management System designed to simplify and automate hospital operations. It offers role-based access for Admins, Doctors, and Patients to manage appointments, users, and announcements efficiently.

---

## 🚀 Features

- 🔐 Role-based login (Admin, Doctor, Patient)
- 📝 Patient self-registration
- 📅 Appointment booking and management
- 🩺 Doctor availability management
- 🗂️ Admin control for doctors, patients, and hospital news
- 🔔 News and announcements module
- 💻 Responsive and secure user interface

---

## 🛠️ Technologies Used

- **Frontend:** HTML, CSS, Bootstrap, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Web Server:** Apache (via XAMPP/WAMP or cPanel)

---

## 📂 Folder Structure

```plaintext
/care
|-- /admin            # Admin dashboard
|-- /doctor           # Doctor dashboard
|-- /patient          # Patient dashboard
|-- /css              # Stylesheets
|-- /js               # JavaScript files
|-- /inc              # Reusable include files
|-- db.php            # Database connection file
|-- index.php         # Main login page
|-- care.sql          # Database file
```

---

## 🏗️ Installation Guide (Local)

### Requirements:

- XAMPP, WAMP, MAMP, or similar local server
- PHP >= 7.0
- MySQL

### Steps:

1. Clone the repository:

```bash
git clone https://github.com/fatima-897/CARE.git
```

2. Move the project folder `/care` to your web server directory (`htdocs` for XAMPP).

3. Import the database:
   - Open **phpMyAdmin**.
   - Create a database named `care`.
   - Import `care.sql` from the project root.

4. Update `db.php` with your database credentials:

```php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "care";
```

5. Start Apache and MySQL.

6. Access via browser:

```
http://localhost/care
```

---

## ☁️ Deployment on Cloud

### ✅ Common for cPanel/Shared Hosting:

1. **Compress** the `/care` folder into a `.zip` file.

2. **Upload** it via **File Manager** in cPanel to the `/public_html` directory.

3. **Extract** the zip file.

4. **Database Setup:**
   - Go to **MySQL Databases** in cPanel.
   - Create a new database (e.g., `care_db`).
   - Create a MySQL user and assign it to the database with **All Privileges**.
   - Go to **phpMyAdmin**, select the database, and import `care.sql`.

5. **Update `db.php`:**

```php
$host = "localhost";
$user = "your_cpanel_db_user";
$pass = "your_cpanel_db_password";
$db   = "your_cpanel_db_name";
```

6. Access your site at:

```
https://yourdomain.com/care
```

### ✅ Heroku Deployment (Optional):

- Use the [Heroku PHP Buildpack](https://elements.heroku.com/buildpacks/heroku/heroku-buildpack-php).
- Set up ClearDB (MySQL) addon for database hosting.
- Upload code via Heroku CLI or GitHub integration.
- Update `db.php` with ClearDB credentials.

### ✅ Vercel/Netlify:

- Not recommended for native PHP/MySQL.
- Use for frontend or serverless functions only.

---

## 🔐 Login Credentials (Sample)

| Role    | Email                          | Password   |
|---------|---------------------------------|------------|
| **Admin**   | admin@care.com   | `admin123`   |
| **Doctor**  | doctor@care.com | `doctor123`  |
| **Patient** | patient@care.com | `patient123` *(or self-register)* |

---

## 📘 Usage

- **Admin:** Manage doctors, patients, appointments, and hospital announcements.
- **Doctor:** Check and manage appointments, update schedules.
- **Patient:** Register, book, and manage appointments.

---

## 🖼️ Screenshots

> *(Insert relevant screenshots here for better clarity.)*

---

## 🔧 Troubleshooting

| Issue                                  | Solution                                       |
|-----------------------------------------|------------------------------------------------|
| Database connection error               | Check `db.php` credentials and server DB info. |
| CSS/JS not loading                      | Verify correct folder structure and file paths.|
| 500 Internal Server Error               | Check `.htaccess` file and PHP version. |
| Cannot import database                  | Check SQL file and server limits. |

---

## 🤝 Contributing

Contributions are welcome!

1. Fork the repository: [Fork Here](https://github.com/fatima-897/CARE/fork)
2. Create your branch: `git checkout -b feature/FeatureName`
3. Commit your changes: `git commit -m 'Add some feature'`
4. Push to the branch: `git push origin feature/FeatureName`
5. Open a Pull Request

For major changes, please open an issue first to discuss what you would like to change.

---

## 📄 License

This project is developed for **educational purposes**. Redistribution, modification, or commercial use is **not permitted** without explicit authorization.

---

## 🚀 Live Demo (Optional)

> *If deployed, provide the URL here.*

```
https://yourdomain.com/care
```
