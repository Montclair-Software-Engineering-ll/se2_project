<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require 'database_connection.php';

    try {
    
      $ID=$_POST['ID'];
      $name=$_POST['name'];
      $category=$_POST['category'];
      $description=$_POST['description'];
      $price=$_POST['price'];
      $quantity=$_POST['quantity'];
      
        $target_dir = "product_pics/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        }       
        else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
     }
    
    
    // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      } 
      // if everything is ok, try to upload file
      else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        }
       else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
              
  // Protect against injections by adding slashes if they aren't present  
  if (!get_magic_quotes_gpc()) {
    $ID = addslashes($ID);
    $name = addslashes($name);
    $category = addslashes($category);
    $description = addslashes($description);
    $price = addslashes($price);
    $quantity = addslashes($quantity); 
  }
  

        echo $imageFileType;
        echo $target_file;

        $stmt = $pdo->prepare("INSERT INTO products (ID, name, category, description, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$ID, $name, $category, $description, $price, $quantity, $target_file]);
        echo 'Rows affected: ' . $stmt->rowCount();
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $pdo = null;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

?>
    <html>

    <head>
        <title>MSUEA - New Product</title>
    </head>
    <style>
        .header {
            padding: 60px;
            text-align: center;
            background: #800000;
            color: white;
            font-size: 30px;
        }

        html,
        body,
        .container {
            height: 100%;
        }

        body {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
        }

        .tablebackground {
            width: 20%;
            text-align: left;
            background-color: black;
        }

        .container {
            display: -webkit-flexbox;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
            justify-content: center;
        }

        .text-center {
            text-align: center;
        }
    </style>



    <body>
        <h1 class="header">MSUEA - New Product</h1>
        <div class="container">
            <!--link html to insert php form-->
            <!--Styling and format for page html-->
            <form action="" method="post" enctype="multipart/form-data">
                <table class="tablebackground" border="2">
                    <tr>
                        <td>ID</td>
                        <td><input type="text" name="ID" maxlength="20" size="20" required></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td> <input type="text" name="name" maxlength="30" size="30" required></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td> <input type="text" name="category" maxlength="60" size="30" required></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td> <input type="text" name="description" maxlength="60" size="30" required></td>
                    </tr>
                    <tr>
                        <td>Price </td>
                        <td><input type="text" name="price" maxlength="7" size="7" required></td>
                    </tr>
                    <tr>
                        <td>Quantity </td>
                        <td><input type="text" name="quantity" maxlength="7" size="7" required></td>
                    </tr>
                    <tr>
                        <td>Image </td>
                        <td><input type="file" name="fileToUpload" id="fileToUpload" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="text-center"><input type="submit" value="Register">
                        </td>
                    </tr>
                </table>
                <table class="tablebackground" border="2">
                    <td colspan="2">
                        <div class="text-center"><button type="submit" formaction="welcome.php">Back</button>
                    </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>

    </html>

<?php
}
?>