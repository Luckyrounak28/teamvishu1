<?php
$servername = "localhost"; // Replace with your DB details
$username = "root"; 
$password = ""; 
$dbname = "cr_management"; // Make sure this matches your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . htmlspecialchars($conn->connect_error));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form fields are set and not empty
    if (isset($_POST['noteTitle']) && isset($_POST['noteContent']) && 
        !empty(trim($_POST['noteTitle'])) && !empty(trim($_POST['noteContent']))) {
        
        $noteTitle = trim($_POST['noteTitle']);
        $noteContent = trim($_POST['noteContent']);

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO notes (note_title, note_content) VALUES (?, ?)");
        if ($stmt === false) {
            die("Error preparing statement: " . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("ss", $noteTitle, $noteContent);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Note submitted successfully!'); window.location.href='main.html';</script>";
        } else {
            echo "Error: " . htmlspecialchars($stmt->error);
        }

        $stmt->close();
    } else {
        echo "Please enter a valid title and content for the note.";
    }
}

$conn->close();
?>
