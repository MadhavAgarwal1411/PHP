<?php

$server_name = 'localhost';
$user_name = 'root';
$password = '@#madHead05';

$conn = mysqli_connect($server_name, $user_name, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }



  $sql = "CREATE DATABASE IF NOT EXISTS student";
  if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
  } else {
    echo "Error creating database: " . mysqli_error($conn);
  }
$sql = "CREATE TABLE IF NOT EXISTS student.student_details (
    srno VARCHAR(10) NOT NULL PRIMARY KEY,
    student_name VARCHAR(30) NOT NULL,
    father_name VARCHAR(30) NOT NULL,
    mother_name VARCHAR(30) NOT NULL,
    dob VARCHAR(20),
    student_address VARCHAR(30) NOT NULL,
    transport VARCHAR(30) NOT NULL,
    contact VARCHAR(15) NOT NULL
    )";

if (mysqli_query($conn, $sql)) {
    echo "Table student_details created successfully";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

//   $sql = "INSERT INTO MyGuests (firstname, lastname, email)
//   VALUES ('John', 'Doe', 'john@example.com')";
  
//   if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//   }
  mysqli_close($conn);
// if(!$conn){
//     die("Not Successful!<br>");
// }
// else{
//     echo "Successful!<br>";
// }
?>