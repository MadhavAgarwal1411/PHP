<!DOCTYPE html>
<html>
    <head>
        <style>
            table{
    width: 100%;
}
        </style>
    </head>
<body>
<?php

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>srno</th><th>student_name</th><th>father_name</th><th>mother_name</th><th>dob</th><th>student_address</th><th>transport</th><th>contact</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}
$server_name = 'localhost';
$user_name = 'root';
$password = '@#madHead05';

$column = $_POST["column"];
$value = $_POST["value"];

// Create connection
try {
    $conn = new PDO("mysql:host=$server_name", $user_name, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM student.student_details WHERE $column = '$value'");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
      echo $v;
    }
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
  echo "</table>";// Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// $sql = "SELECT * FROM student.student_details WHERE $column = '$value'";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while($row = mysqli_fetch_assoc($result)) {
//         echo "srno: " . $row["srno"]. " - student_name: " . $row["student_name"]. " father_name: " . $row["father_name"]. "mother_name: " . $row["mother_name"]. " - dob: " . $row["dob"]. " student_address: " . $row["student_address"] . " transport: " . $row["transport"] . " contact: " . $row["contact"] . "<br>";
//     }
// } else {
//     echo "No results found";
// }

  ?>
</body>
</html>