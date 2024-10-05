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

// Prepare and bind parameters
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = $_POST['courseUpdate'];
    $branch = $_POST['branchUpdate'];
    $year = $_POST['yearUpdate'];
    $section = $_POST['sectionUpdate'];
    $rollNumber = $_POST['rollNumberUpdate'];
    $studentName = $_POST['studentNameUpdate'];

    // Prepare the SQL statement
    $sql = "INSERT INTO students (course, branch, year, section, roll_number, student_name) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $course, $branch, $year, $section, $rollNumber, $studentName);

    // Execute the statement and check if successful
    if ($stmt->execute()) {
        echo "New student added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
}

$conn->close();
?>
