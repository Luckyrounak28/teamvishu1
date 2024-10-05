<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'cr_management');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $course = $_POST['course'];
   $branch = $_POST['branch'];
   $year = $_POST['year'];
   $section = $_POST['section'];
   $roll_no = $_POST['roll_no'];
   $lecture_date = $_POST['lecture_date'];
   $present = $_POST['present'] == 'on' ? 1 : 0;

   // Insert data into the attendance table
   $query = "INSERT INTO attendance (course, branch, year, section, roll_no, lecture_date, present) 
             VALUES ('$course', '$branch', '$year', '$section', '$roll_no', '$lecture_date', '$present')";
   $conn->query($query);
   echo "Attendance logged successfully!";
}
?>

<form method="POST" action="">
   Course: <input type="text" name="course"><br>
   Branch: <input type="text" name="branch"><br>
   Year: <input type="number" name="year"><br>
   Section: <input type="text" name="section"><br>
   Roll No: <input type="number" name="roll_no"><br>
   Lecture Date: <input type="date" name="lecture_date"><br>
   Present: <input type="checkbox" name="present"><br>
   <input type="submit" value="Submit Attendance">
</form>
