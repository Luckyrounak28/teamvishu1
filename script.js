// Function to show the selected section and hide others
function showSection(sectionId) {
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
        section.style.display = 'none'; // Hide all sections
    });
    document.getElementById(sectionId).style.display = 'block'; // Show the selected section
}

// Event listener for attendance form submission
document.getElementById('attendanceForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const course = document.getElementById('course').value;
    const branch = document.getElementById('branch').value;
    const year = document.getElementById('year').value;
    const rollNumber = document.getElementById('rollNumber').value;
    const section = document.getElementById('section').value;
    const studentName = document.getElementById('studentName').value;
    const status = document.getElementById('status').value;

    const attendanceLog = document.getElementById('attendanceLog');
    attendanceLog.innerHTML = `<p>Attendance logged for ${studentName} (${rollNumber}) - ${status}</p>`;
});

// Event listener for notes form submission
document.getElementById('notesForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const noteTitle = document.getElementById('noteTitle').value;
    const noteContent = document.getElementById('noteContent').value;

    const notesLog = document.getElementById('notesLog');
    notesLog.innerHTML = `<p><strong>${noteTitle}:</strong> ${noteContent}</p>`;
});

// Event listener for complaint form submission
document.getElementById('complaintForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const complaintText = document.getElementById('complaintText').value;

    const complaintLog = document.getElementById('complaintLog');
    complaintLog.innerHTML = `<p>Complaint submitted: ${complaintText}</p>`;
});

// Function to dynamically populate dummy attendance for 70 students
function populateDummyAttendance() {
    const studentRows = document.getElementById('studentRows');
    studentRows.innerHTML = ''; // Clear any existing rows

    for (let i = 1; i <= 70; i++) {
        const row = document.createElement('tr');

        const rollNumber = document.createElement('td');
        rollNumber.textContent = '23036301' + String(i).padStart(3, '0'); // Example roll number
        row.appendChild(rollNumber);

        const studentName = document.createElement('td');
        studentName.textContent = 'Student ' + i;
        row.appendChild(studentName);

        for (let j = 1; j <= 8; j++) {
            const attendanceCell = document.createElement('td');
            const select = document.createElement('select');
            select.innerHTML = `
                <option value="P">P</option>
                <option value="A">A</option>
            `;
            attendanceCell.appendChild(select);
            row.appendChild(attendanceCell);
        }

        studentRows.appendChild(row); // Add the row to the table
    }
}

// Event listener for dummy attendance form submission
document.getElementById('dummyAttendanceForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const lectureDate = document.getElementById('lectureDate').value;
    alert('Attendance for lecture on ' + lectureDate + ' has been submitted!');
});

// Populate dummy attendance table on page load
document.addEventListener('DOMContentLoaded', function () {
    populateDummyAttendance();
    showSection('attendance'); // Default section to show on load
});

// Event listener for student update form
document.getElementById('updateStudentForm').addEventListener('submit', function (event) {
    event.preventDefault();
    alert('Student data has been updated successfully!');
});

// Setup click listeners for menu buttons to show respective sections
document.querySelectorAll('.menu button').forEach(button => {
    button.addEventListener('click', function () {
        const sectionId = this.getAttribute('onclick').split("'")[1];
        showSection(sectionId);
    });
});
// Function to show the selected section and hide others
function showSection(sectionId) {
    // Hide all sections
    var sections = document.querySelectorAll('.section');
    sections.forEach(function(section) {
        section.style.display = 'none';
    });

    // Show the selected section
    var selectedSection = document.getElementById(sectionId);
    if (selectedSection) {
        selectedSection.style.display = 'block';
    }
}

// Initially hide all sections except the first one (optional)
document.addEventListener('DOMContentLoaded', function() {
    showSection('attendance');  // Show the default section (can be any section)
});
