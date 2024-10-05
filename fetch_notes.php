<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cr_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM notes ORDER BY submitted_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<p><strong>Title:</strong> " . $row['note_title'] . "</p>";
        echo "<p><strong>Content:</strong> " . $row['note_content'] . "</p>";
        echo "<p><em>Shared on: " . $row['submitted_at'] . "</em></p>";
        echo "</div><hr>";
    }
} else {
    echo "No notes found.";
}

$conn->close();
?>
