<?php
   $host = 'localhost';
   $user='root';
   $pass='';
   $dbname='seku_guest_house';

   $con = mysqli_connect($host,$user,$pass,$dbname);
   
   // Check if form is submitted
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Check if food record is submitted
      if (isset($_POST['id']) && isset($_POST['item_name']) && isset($_POST['item_price'])) {
         $id = $_POST['id'];
         $item_name = $_POST['item_name'];
         $item_price = $_POST['item_price'];
         if ($con) {
            echo 'connected successfully';
         }

         $sql = "INSERT INTO menu (id, item_name, item_price) VALUES ('$id', '$item_name', '$item_price')";
         $query = mysqli_query($con, $sql);
         if ($query) {
            echo 'database inserted successfully';
            echo "<script> alert('Data inserted successfully'); </script>";
         } 
      }
   }
?>

  