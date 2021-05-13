<?php
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