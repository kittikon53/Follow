<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "followup";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจาก Ajax request
$project_name = $conn->real_escape_string($_POST['project_name']);
$progress = $conn->real_escape_string($_POST['progress']);
$start_date = $conn->real_escape_string($_POST['start_date']);
$due_date = $conn->real_escape_string($_POST['due_date']);
$label_color = $conn->real_escape_string($_POST['label_color']);
$task_description = $conn->real_escape_string($_POST['task_description']);
$file = $conn->real_escape_string($_POST['file']);
$comment = $conn->real_escape_string($_POST['comment']);

// เตรียม SQL query ด้วย prepared statements
$sql = $conn->prepare("INSERT INTO tasks (project_name, progress, start_date, due_date, label_color, task_description, file, comment)
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

// ผูกค่าและทำการ execute
$sql->bind_param("ssssssss", $project_name, $progress, $start_date, $due_date, $label_color, $task_description, $file, $comment);

// ทำการ execute คำสั่ง SQL
if ($sql->execute()) {
    echo "Task added successfully";
} else {
    echo "Error: " . $sql->error;
}

// ปิด prepared statement
$sql->close();

// ปิดการเชื่อมต่อกับฐานข้อมูล
$conn->close();
?>
