## Installation

### Step 1: Clone the Repository

First, clone this repository to your local machine using Git:

```bash or open cmd
git clone git@github.com:trilochankumar9/BlogManagement.git
cd repository-name

# Ensure you have Composer installed. Then, within the project directory, run:

composer install

## Copy the .env.example file to create a new .env file
## Generate a new application key
php artisan key:generate

## Configure the .env file to connect to your database. For example
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

## Open your XAMPP & start Apache and MYSQL and in browser hit the below url to open the phpMyAdmin
http://localhost/phpmyadmin/index.php

# create a new table and import the table i have provided in below folder
database -> SQL -> blog-main.sql

# Run below command in cmd and go to the directory where the project is

# Run below code there

php artisan config:cache
php artisan route:cache
php artisan view:cache

# Serve the project using below command

php artisan serve

# and run the project on below url
http://127.0.0.1:8000/

# You can login as admin using below credentials
email: - admin@gmail.com
password: - 123456

### User Authentication
- Added user registration and login functionality.
- Integrated Google social login.
- Implemented separate login for administrators.

### Role Management and Dashboards
- Enabled role-based access control for Users and Admins.
- Designed separate dashboards for Admins and Users.

### Post and Comment Management
- Users can view posts and manage their comments.
- Implemented CRUD operations for user posts.

### Admin Management
- Added functionality for Admins to edit and delete users and posts.

### Security
- Secure logout functionality for both Users and Admins.

### Notes
- All features tested and verified for functionality.