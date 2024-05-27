<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Project</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Submission Details</h1>
        <form id="projectForm">
        <input type="hidden" id="project_id" name="project_id">
            <div class="form-group">
                <label for="student_name">Student Name:</label>
                <input type="text" id="student_name" name="student_name" required>
            </div>
            <div class="form-group">
                <label for="student_roll_no">Student Roll No:</label>
                <input type="text" id="student_roll_no" name="student_roll_no" required>
            </div>
            <div class="form-group">
                <label for="section">Section:</label>
                <input type="text" id="section" name="section" required>
            </div>
            <div class="form-group">
                <label for="course">Course:</label>
                <input type="text" id="course" name="course" required>
            </div>
            <div class="form-group">
                <label for="project_type">Project Type:</label>
                <input type="text" id="project_type" name="project_type" required>
            </div>
            <div class="form-group">
                <label for="project_details">Project Details:</label>
                <textarea id="project_details" name="project_details" required></textarea>
            </div>
            <div class="form-group">
                <label for="remarks">Remarks:</label>
                <textarea id="remarks" name="remarks"></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
        
        <h2>Submitted Projects</h2>
        <table id="projectsTable">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Student Roll No</th>
                    <th>Section</th>
                    <th>Course</th>
                    <th>Project Type</th>
                    <th>Project Details</th>
                    <th>Remarks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>
</html>
