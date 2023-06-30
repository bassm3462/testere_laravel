<?php
$servername="localhost";
$username="root";
$password="";
try{
    $conn = new PDO("mysql:host=$servername;dbname=blaance", $username, $password);
 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
 catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>