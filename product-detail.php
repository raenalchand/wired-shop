<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Product Detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <!-- owl.carousel css -->
 
       <!-- Animate css -->
        
    <!-- font-awesome css -->
    <link rel="stylesheet" href="public/css/font-awesome.min.css">

   <!-- responsive css -->
   <link rel="stylesheet" href="public/fonts/font/css/svg-with-js.min.css" type="text/css">
   <link rel="stylesheet" href="public/fonts/font/css/solid.css" type="text/css">
   <link rel="stylesheet" href="public/fonts/font/css/solid.min.css" type="text/css">
   <link rel="stylesheet" href="public/fonts/font/css/brands.min.css" type="text/css">
   <link rel="stylesheet" href="public/fonts/font/css/all.css" type="text/css">
   <link rel="stylesheet" href="public/fonts/font/css/brands.css" type="text/css">

   <link rel="stylesheet" href="public/fonts/font/css/pagination.css" type="text/css">
   <link rel="stylesheet" href="public/fonts/font/css/phppot-style.css" type="text/css">

   <link rel="stylesheet" href="public/fonts/font/css/fontawesome.min.css" type="text/css">
   <!--font Style -->
   <link rel="stylesheet" href="public/fonts/font/css/fontawesome.css" type="text/css">
   <!--Responsive Style -->
   <link rel="stylesheet" href="public/fonts/font/css/fontawesome.css" type="text/css">
   <!--Responsive Style -->
    <link rel="stylesheet" href="css/wired.css" type="text/css">
  </head>
  <body>
  <div class="topnav" id="myTopnav">
      <a href="/wired-shop/index.php">Home</a>
      <a href="/wired-shop/wired.php">Wired</a>
      <a href="/wired-shop/wireless.php">Wireless</a>
      <a href="/wired-shop/accessories.php">Accesories</a>
  </div>

    <?php
      $servername = "localhost";
      $username   = "root";
      $password   = "";
      $dbname     = "wired_db";

      //Create new connection to the database
      $conn = new mysqli ($servername, $username, $password, $dbname);

      if($conn->connect_error){
        die("Connection Failed: ".  $conn->connect_error);
      }
      else {
        // echo "Connection Success";
      }

     ?>
<div class="container-fluid p-3 product-details">

<center><h1 >This is a product details page.</h1></center>
   


    <div class="main_body" style="text-align: center">

    <?php

      $sql = "SELECT * FROM products WHERE product_id = " . $_GET['id'];
      $result = $conn->query($sql);

      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          if ($row['product_image'] == null || $row['product_image'] == "" ) {
            echo "<img height=350 width=350 src=/wired-shop/resources/images/placeholder.jpg >" ;
          }
          else{
            echo "<img height=350 width=350 src=/wired-shop/resources/images/" . $row['product_image'] . " >" ;
          }

          echo "<h2>";
          echo $row["product_name"];
          echo " $". $row["product_price"];
          echo "</h2>";
          echo "<p>";
          echo $row["product_description"];
          echo "</p>";
          echo "<p>";
          echo $row["product_type"];
          echo "</p>";
          echo "<a href='/wired-shop/product-update.php/?id=".$row['product_id']. "'> <input type='button'  value='Buy'></a>";

          //Display product type and if the prodcut is available or not.
        }
      }
      else{
        echo "Table is empty";
      }

      $conn->close();
    ?>

    </div>








  </body>
</html>
