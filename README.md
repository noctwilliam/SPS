# Smart Parking System

### This is a project for the course CSC577

Steps to run the project:
1. Create a database and three tables named `admin`, `customer`, `reservation` in any of your MySQL preferred administrator tool.
2. Run the SQL file in the `/assets/sql` folder to create the tables.
3. Create a file named `connect.php` and add the following code to it.
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