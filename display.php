<!Doctype html>
<html>
    <head>
        <title>Student Database</title>
        <link rel="stylesheet" href="">
        <style>
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
html,body{
    height: 100%;
    width: 100%;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: #111;
}
table{
    width: 100%;
}
        </style>
    </head>
    <body>
    <ul>
        <li><a href="insert/insert.html">Insert</a></li>
        <li><a href="modify/modify.html">Modify</a></li>
        <li><a href="delete/delete.html">Delete</a></li>
        <li><a href="search/search.html">Search</a></li>
</ul><br>
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

$dbname = "student";

try {
  $conn = new PDO("mysql:host=$server_name;dbname=$dbname", $user_name, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM student_details");
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
echo "</table>";
?>
</body>
</html>