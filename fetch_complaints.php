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

// Query to fetch all complaints
$sql = "SELECT id, complaint_text, submitted_at FROM complaints ORDER BY submitted_at DESC";
$result = $conn->query($sql);

// Check if there are any complaints
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Complaint</th>
                <th>Submitted At</th>
            </tr>";
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['complaint_text']) . "</td>
                <td>" . htmlspecialchars($row['submitted_at']) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No complaints found.";
}

$conn->close();
?>
