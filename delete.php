<<?php

$server_name = 'localhost';
$user_name = 'root';
$password = '@#madHead05';
$conn = mysqli_connect($server_name, $user_name, $password);

$column = $_POST["column"];
$value = $_POST["value"];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
$sql = "DELETE FROM student.student_details WHERE $column = '$value'";

  if (mysqli_query($conn, $sql)) {
    echo "<h2>Record deleted successfully</h2>";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
  mysqli_close($conn);

  ?>
