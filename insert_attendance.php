<?php
// Database connection
$servername = "localhost";
$username = "root";  // replace with your database username
$password = "";      // replace with your database password
$dbname = "cr_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the lecture date and other details
$lectureDate = $_POST['lectureDate'];
$course = $_POST['course']; // New field
$branch = $_POST['branch']; // New field
$year = $_POST['year']; // New field
$section = $_POST['section']; // New field

// Prepare an array to hold attendance records
$attendanceRecords = [];

// Assume student data comes from JavaScript and is sent in a POST request
foreach ($_POST['students'] as $student) {
    $rollNumber = $student['rollNumber'];
    $studentName = $student['name'];
    $attendance = [
        'roll_number' => $rollNumber,
        'student_name' => $studentName,
        'lecture_date' => $lectureDate,
        'course' => $course,
        'branch' => $branch,
        'year' => $year,
        'section' => $section,
        'lecture1' => $student['lecture1'] ?? 'Absent',
        'lecture2' => $student['lecture2'] ?? 'Absent',
        'lecture3' => $student['lecture3'] ?? 'Absent',
        'lecture4' => $student['lecture4'] ?? 'Absent',
        'lecture5' => $student['lecture5'] ?? 'Absent',
        'lecture6' => $student['lecture6'] ?? 'Absent',
        'lecture7' => $student['lecture7'] ?? 'Absent',
        'lecture8' => $student['lecture8'] ?? 'Absent',
    ];
    $attendanceRecords[] = $attendance;

    // Insert each record into the database
    $sql = "INSERT INTO attendance (roll_number, student_name, lecture_date, course, branch, year, section, lecture1, lecture2, lecture3, lecture4, lecture5, lecture6, lecture7, lecture8) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisssssssssssss", 
        $attendance['roll_number'], 
        $attendance['student_name'], 
        $attendance['lecture_date'], 
        $attendance['course'], 
        $attendance['branch'], 
        $attendance['year'], 
        $attendance['section'], 
        $attendance['lecture1'], 
        $attendance['lecture2'], 
        $attendance['lecture3'], 
        $attendance['lecture4'], 
        $attendance['lecture5'], 
        $attendance['lecture6'], 
        $attendance['lecture7'], 
        $attendance['lecture8']
    );
    
    $stmt->execute();
}

$stmt->close();
$conn->close();

// Redirect or show a success message
echo "Attendance recorded successfully!";
?>
