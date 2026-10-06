# CodeIgniter 4 - WHO'S ALLOWED IN? SESSIONS AND AUTHENTICATION(TFA4)

## Project Description
This application is a Web-based Information System developed using CodeIgniter 4 framework and MySQL database. It retrieves and displays records from the `customers` and `users` tables, styled using Bootstrap 5.

## Prerequisites
- XAMPP (Apache & MySQL)
- PHP 8.1 or higher
- Composer

## Local Setup & Database Configuration

### 1. Database Setup
1. Open XAMPP Control Panel and start **Apache** and **MySQL**.
2. Open phpMyAdmin at `http://localhost/phpmyadmin`.
3. Create a new database named **`pos_db`**.
4. Click on the **`pos_db`** database, go to the **Import** tab at the top.
5. Choose the **`schema.sql`** file located in the root directory of this project and click **Import**.

### 2. Environment Setup (.env)
1. Copy the `.env` file (or duplicate `env` as `.env`).
2. Ensure the following environment and database connection variables are configured:

```ini
CI_ENVIRONMENT = development

database.default.hostname = localhost
database.default.database = pos_db
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.port = 3306