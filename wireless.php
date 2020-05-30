<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wireless Headphones</title>
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
   <link rel="stylesheet" href="css/wired.css" type="text/css">
  </head>
  <body>
    
  <div class="main_body" style="text-align: center">
    <nav>
    <div class="topnav" id="myTopnav">
      <a href="/wired-shop/index.php">
        <img src="resources/images/wired.jpg" alt="Company Logo" width="100" height="100">
      </a>
      <a href="/wired-shop/wired.php">Wired</a>
      <a class="active" href="/wired-shop/wireless.php">Wireless</a>
      <a href="/wired-shop/accessories.php">Accesories</a>
    </div>
    </nav>
    <h1>Wireless</h1>

        <?php
          $servername = "localhost";
          $username   = "root";
          $password   = "";
          $dbname     = "wired_db";

          //Create new connection to the database
          $conn = new mysqli($servername, $username, $password, $dbname);

          if($conn->connect_error){
            die("Connection Failed: ".  $conn->connect_error);
          }
          else {
            // echo "Connection Success";
          }

         ?>

         <?php

           $sql = "SELECT * FROM products WHERE product_type='wireless'";
           $result = $conn->query($sql);

           if($result->num_rows > 0){
             while($row = $result->fetch_assoc()){
               echo "<br>";
               if ($row['product_image'] == null || $row['product_image'] == "" ) {
                 echo "<img height=150 width=150 src=resources/images/placeholder.jpg >" ;
               }
               else{
                 echo "<img height=150 width=150 src=resources/images/" . $row['product_image'] . " >" ;
               }

               echo "<h2> <a href='product-detail.php/?id=". $row['product_id'] . " ' target='_blank'>";
               echo $row["product_name"];
               echo "</a>";
               echo " $". $row["product_price"];
               echo "</h2>";
               echo "<p>";
               echo $row["product_description"];
               echo "</p>";
               echo "<p>";
               echo $row["product_type"];
               echo "</p>";

               if($row["product_availability"] != 0){
                 echo "Product is available to buy";
               }
               else{
                 echo "Product is NOT available to buy";
               }
               echo "<br>";
               //Display product type and if the prodcut is available or not.
             }
           }
           else{
             echo "Table is empty";
           }

           $conn->close();
         ?>
  </body>
</html>
