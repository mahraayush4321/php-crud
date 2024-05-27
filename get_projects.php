<?php
include 'db.php';

$sql = "SELECT * FROM projects";
$result = $conn->query($sql);

$projects = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
}

echo json_encode(['projects' => $projects]);

$conn->close();
?>
