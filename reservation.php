


<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $idNumber = $_POST['idNumber'];
   $idNumber= filter_var($idNumber, FILTER_SANITIZE_STRING);
   $nationality= $_POST['nationality'];
   $nationality = filter_var($nationality, FILTER_SANITIZE_STRING);
   $phoneNumber= sha1($_POST['phoneNumber']);
   $phoneNumber= filter_var($phoneNumber, FILTER_SANITIZE_STRING);
   $arrivalDate= sha1($_POST['arrivalDate']);
   $arrivalDate = filter_var($arrivalDate, FILTER_SANITIZE_STRING);
   $departureDate= sha1($_POST['departureDate']);
   $departureDate = filter_var($departureDate, FILTER_SANITIZE_STRING);
   $roomCategory= sha1($_POST['roomCategory']);
   $roomCategory= filter_var($roomCategory, FILTER_SANITIZE_STRING);
   $rate= sha1($_POST['rate']);
   $rate= filter_var($rate, FILTER_SANITIZE_STRING);

$select_user = $conn->prepare("SELECT * FROM `room_reservatoion` WHERE name = ? OR idNumber = ?");
   $select_user->execute([$name, $idNumber]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $message[] = 'name or id number already exists!';
   }
  // else{
      //if($pass != $cpass){
        // $message[] = 'confirm password not matched!';
      //}
      else{
         $insert_user = $conn->prepare("INSERT INTO ` room_reservation `(name, idNumber, nationality, phoneNumber, arrivalDate, departureDate, roomCategory, rate) VALUES(?,?,?,?)");
         $insert_user->execute([$name, $idNumber, $nationality, $phoneNumber, $arrivalDate, $departureDate, $roomCategory, $rate]);
         $select_user = $conn->prepare("SELECT * FROM ` room_reservation ` WHERE name = ? AND phoneNumber = ?");
         $select_user->execute([$name, $phoneNumber]);
         $row = $select_user->fetch(PDO::FETCH_ASSOC);
        if($select_user->rowCount() > 0){
            $_SESSION['user_id'] = $row['id'];
           header('location:home.php');
         }
      }
   
    }
?>