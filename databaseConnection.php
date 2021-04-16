<?php
/*
Mysqli connection for reference
// DATABASE INFORMATION AND USER PASSWORD
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'group2'); // changed
define('DB_PASSWORD', 'M0ntcl@ir2021'); // changed
define('DB_DATABASE', 'se2_project'); // changed
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if($conn === false){
 die("ERROR: Could not connect. " . mysqli_connect_error());
}
*/

//PDO used
//attempts to connect to db
try {
    $dsn = 'mysql:host=localhost; dbname=se2_project';
    $db = new PDO ($dsn, "group2", "M0ntcl@ir2021");

    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } 	

  //outputs error if db connection fails
  catch(PDOException $e) {
        echo "Connection failed: ".$e->getMessage();
  }
?>