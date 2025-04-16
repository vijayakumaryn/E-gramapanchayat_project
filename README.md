# E-Grampanchayat Management System

The **E-Grampanchayat Project** is a web-based application developed using **HTML, CSS, PHP, and MySQL**, designed to digitize and streamline the administrative tasks and services of a Grampanchayat (village-level local government) in India. This system enables villagers and officials to interact efficiently through a digital platform.

---

## 🌐 Features

- Admin login and control panel
- Citizen registration and login
- Service request system (e.g., birth/death certificates, property documents)
- Grievance submission and tracking
- Announcement/notice board for public updates
- Responsive UI with user-friendly interface

---

## 💻 Technologies Used

- **Frontend:** HTML5, CSS3
- **Backend:** PHP
- **Database:** MySQL
- **Local Server:** XAMPP (Apache + MySQL)

---

## ⚙️ How to Run the Project Locally

### 1. Install Requirements
- [XAMPP](https://www.apachefriends.org/) (version 7.4+ recommended)

### 2. Setup Instructions

1. **Clone or download** this repository.
2. Copy the entire project folder into the `htdocs` directory of XAMPP.  
   Example:  
   `C:\xampp\htdocs\e-grampanchayat`
3. Open **XAMPP Control Panel** and start **Apache** and **MySQL**.
4. Import the database:
   - Open `http://localhost/phpmyadmin/`
   - Create a new database (e.g., `grampanchayat_db`)
   - Click **Import** and upload the provided `.sql` file (inside the project folder)
5. Run the project in your browser:  
   `http://localhost/e-grampanchayat`
