<?php
include 'db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM projects WHERE id = $id";
$result = $conn->query($sql);

$project = [];

if ($result->num_rows > 0) {
    $project = $result->fetch_assoc();
}

echo json_encode(['project' => $project]);

$conn->close();
?>
