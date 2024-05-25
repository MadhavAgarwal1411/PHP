<?php

$server_name = 'localhost';
$user_name = 'root';
$password = '@#madHead05';

$conn = mysqli_connect($server_name, $user_name, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
$student_name = $_POST["student_name"];
$srno = $_POST["srno"];
$father_name = $_POST["father_name"];
$mother_name = $_POST["mother_name"];
$contact = $_POST["contact"];
$transport = $_POST["transport"];
$student_address = $_POST["student_address"];
$dob = $_POST["dob"];


  $sql = "INSERT INTO student.student_details (srno, student_name, father_name, mother_name, dob, contact, student_address, transport)
  VALUES ('$srno', 'student_name', '$father_name', '$mother_name', '$dob', '$contact', '$student_address', '$transport')";
  
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
?>