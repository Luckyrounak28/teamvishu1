<?php
// Database connection
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "cr_management"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$course = $_POST['course'];
$branch = $_POST['branch'];
$year = $_POST['year'];
$section = $_POST['section'];
$roll_number = $_POST['roll_number'];
$student_name = $_POST['student_name'];

// Insert or update student data
$sql = "INSERT INTO students (roll_number, student_name, course, branch, year, section) 
        VALUES ('$roll_number', '$student_name', '$course', '$branch', $year, '$section') 
        ON DUPLICATE KEY UPDATE 
        student_name='$student_name', course='$course', branch='$branch', year=$year, section='$section'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
