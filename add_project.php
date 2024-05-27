<?php
include 'db.php';

$student_name = $_POST['student_name'];
$student_roll_no = $_POST['student_roll_no'];
$section = $_POST['section'];
$course = $_POST['course'];
$project_type = $_POST['project_type'];
$project_details = $_POST['project_details'];
$remarks = $_POST['remarks'];

$sql = "INSERT INTO projects (student_name, student_roll_no, section, course, project_type, project_details, remarks) VALUES ('$student_name', '$student_roll_no', '$section', '$course', '$project_type', '$project_details', '$remarks')";

$response = [];

if ($conn->query($sql) === TRUE) {
    $response['success'] = true;
} else {
    $response['success'] = false;
}

echo json_encode($response);

$conn->close();
?>
