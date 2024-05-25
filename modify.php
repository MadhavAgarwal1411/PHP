<?php

$server_name = 'localhost';
$user_name = 'root';
$password = '@#madHead05';

$conn = mysqli_connect($server_name, $user_name, $password);

$search_column = $_POST["search_column"];
$change_column = $_POST["change_column"];
$value = $_POST["value"];
$new_value = $_POST["new_value"];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }


  $sql = "UPDATE student.student_details SET $change_column='$new_value' WHERE $search_column='$value'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
  mysqli_close($conn);

?>
