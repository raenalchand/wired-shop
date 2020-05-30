<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wired Online Shopping</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <!-- owl.carousel css -->
 
       <!-- Animate css -->
        
    <!-- font-awesome css -->
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
   <link rel="stylesheet" href="public/fonts/font/css/fontawesome.css" type="text/css">
   <!--Responsive Style -->
   <link rel="stylesheet" href="css/wired.css" type="text/css">
   <!-- Google-Font-->
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

  
    <div class="topnav" id="myTopnav">
      <a class="active" href="index.php">
        <img src="resources/images/wired.jpg" alt="Company Logo" width="100" height="100">
      </a>
      <a href="wired.php">Wired</a>
      <a href="wireless.php">Wireless</a>
      <a href="accessories.php">Accesories</a>
      <a href="javascript:void(0);" class="icon" style="float: right;" onclick="myFunction()">&#9776;</a>
      <form action="/action_page.php">
      <input type="text" placeholder="Search Here" name="search">
      </form>
    </div>


    <div class="main_body" style="text-align: center">

      <div class="featured">
        <h1 style="color: blue; background-color: white;">Our Featured products</h1>
      <?php
        $sql = "SELECT * FROM products WHERE featured ='YES'"; 
        $result = $conn->query($sql);
?>
<table border="2">


        <?php
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){

            echo "<tr>";
              echo "<td>";
              echo "<h2> <a href='product-detail.php/?id=". $row['product_id'] . " ' target='_blank'>";
                echo $row["product_name"];
              echo "</td>";
            echo "</tr>";


          }
        }
        else{
          echo "No featured products";
        }


     ?>
      </div>
</table>

<h1>Our Products</h1>
    <?php

      $sql = "SELECT * FROM products";
      $result = $conn->query($sql);

      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){

          if($row["product_availability"] != 0){
            echo "<br >";
            if ($row['product_image'] == null || $row['product_image'] == "" ) {
              echo "<img height=150 width=150 src=resources/images/ >" ;
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

            echo "<br>";
          }


          //Display product type and if the prodcut is available or not.
        }
      }
      else{
        echo "Table is empty";
      }

      $conn->close();
    ?>

    </div>


<br><br>
    <footer>
      <a href="#">Contact Us</a>
      <a href="#">About Us</a>
      <a href="#">Support</a>
    </footer>
<script>
    /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
  </body>
</html>
