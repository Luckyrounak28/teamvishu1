<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'cr_management');

// Retrieve attendance data
$query = "SELECT * FROM attendance";
$result = $conn->query($query);
?>

<table border="1">
   <thead>
      <tr>
         <th>Course</th>
         <th>Branch</th>
         <th>Year</th>
         <th>Section</th>
         <th>Roll No</th>
         <th>Lecture Date</th>
         <th>Present</th>
      </tr>
   </thead>
   <tbody>
      <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
         <td><?php echo $row['course']; ?></td>
         <td><?php echo $row['branch']; ?></td>
         <td><?php echo $row['year']; ?></td>
         <td><?php echo $row['section']; ?></td>
         <td><?php echo $row['roll_no']; ?></td>
         <td><?php echo $row['lecture_date']; ?></td>
         <td><?php echo $row['present'] ? 'Yes' : 'No'; ?></td>
      </tr>
      <?php } ?>
   </tbody>
</table>
