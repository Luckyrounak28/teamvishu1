<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "cr_management";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to fetch students
$sql = "SELECT course, branch, year, section, roll_number, student_name FROM students";
$result = $conn->query($sql);

// Initialize an array to store student data
$students = array();

if ($result->num_rows > 0) {
    // Fetch all students and add to the array
    while($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

// Return the data as a JSON response
header('Content-Type: application/json');
echo json_encode($students);

// Close the connection
$conn->close();
?>
