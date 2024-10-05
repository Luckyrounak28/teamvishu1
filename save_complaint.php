<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "cr_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . htmlspecialchars($conn->connect_error));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['complaintText']) && !empty(trim($_POST['complaintText']))) {
        $complaintText = trim($_POST['complaintText']);

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO complaints (complaint_text) VALUES (?)");
        if ($stmt === false) {
            die("Error preparing statement: " . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("s", $complaintText);

        if ($stmt->execute()) {
            echo "<script>alert('Complaint submitted successfully!'); window.location.href='main.html';</script>";
        } else {
            echo "Error: " . htmlspecialchars($stmt->error);
        }

        $stmt->close();
    } else {
        echo "Please enter a valid complaint.";
    }
}

$conn->close();
?>
