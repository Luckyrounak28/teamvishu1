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

// Query to fetch the last 10 complaints, ordered by submission date
$sql = "SELECT complaint_text, submitted_at FROM complaints ORDER BY submitted_at DESC LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><strong>" . htmlspecialchars($row['submitted_at']) . ":</strong> " . htmlspecialchars($row['complaint_text']) . "</li>";
    }
    echo "</ul>";
} else {
    echo "No complaints found.";
}

$conn->close();
?>
