<?php
include 'db.php';

$id = $_POST['id'];
$student_name = $_POST['student_name'];
$student_roll_no = $_POST['student_roll_no'];
$section = $_POST['section'];
$course = $_POST['course'];
$project_type = $_POST['project_type'];
$project_details = $_POST['project_details'];
$remarks = $_POST['remarks'];

$sql = "UPDATE projects SET student_name='$student_name', student_roll_no='$student_roll_no', section='$section', course='$course', project_type='$project_type', project_details='$project_details', remarks='$remarks' WHERE id=$id";

$response = [];

if ($conn->query($sql) === TRUE) {
    $response['success'] = true;
} else {
    $response['success'] = false;
}

echo json_encode($response);

$conn->close();
?>
