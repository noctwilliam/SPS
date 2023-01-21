# Smart Parking System

### This is a project for the course CSC577

Steps to run the project:
1. Create a database and three tables named `admin`, `customer`, `reservation` in MySQL.
2. Run the SQL file in the `sql` folder to create the tables.
3. Create a file named `connect.php` in the `php` folder and add the following code:
```php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'sps'; // name of the database

$conn = new mysqli($host, $username, $password, $database);

if (!$conn){
    die("Database Connection Failed" . mysqli_error($conn));
}
```