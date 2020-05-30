<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/wired.css" type="text/css">

    <div class="main_body" style="text-align: center">
  </head>
  <body>
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

     <nav>
       <a href="/wired-shop/index.php">
         <img src="/wired-shop/resources/images/wired.jpg" alt="Company Logo" width="100" height="100">
       </a>
       <a href="/wired-shop/wired.php">Wired</a>
       <a href="/wired-shop/wireless.php">Wireless</a>
       <a href="/wired-shop/accessories.php">Accesories</a>
     </nav>

     <?php
      $update_sql = "UPDATE products SET wishlist='NO' WHERE product_id=". $_GET['id'];

      if($conn->query($update_sql) == TRUE){
        $sql = "SELECT * FROM products WHERE wishlist ='YES'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){

            echo "<h2>";
            echo $row["product_name"];
            echo "<br>";
            echo "<a href='/wired-shop/product-remove.php/?id=".$row['product_id']. "'>Remove from Wishlist</a>";
            echo"<br>";
            //Display product type and if the prodcut is available or not.
          }
        }
        else{
          echo "Table is empty";
        }

      }

       $conn->close();
     ?>

  </body>
</html>
