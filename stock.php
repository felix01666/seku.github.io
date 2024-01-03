<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Check if food record is submitted
  if (isset($_POST['date']) && isset($_POST['food_opened']) && isset($_POST['food_additional']) && isset($_POST['food_issued']) && isset($_POST['food_closing'])) {
    $food_date = $_POST['date'];
    $food_opened = $_POST['opened'];
    $food_additional = $_POST['additional'];
    $food_issued = $_POST['issued'];
    $food_closing = $_POST['closing'];

    // Open the CSV file for appending
    $file = fopen('food-stock.csv', 'a');

    // Add the new record to the CSV file
    fputcsv($file, array($food_date, $food_opened, $food_additional, $food_issued, $food_closing));

    // Close the CSV file
    fclose($file);

    // Redirect to the same page to clear the form
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
  }

  // Check if accommodation record is submitted
  if (isset($_POST['acc_date']) && isset($_POST['acc_opened']) && isset($_POST['acc_additional']) && isset($_POST['acc_issued']) && isset($_POST['acc_closing'])) {
    $acc_date = $_POST['acc_date'];
    $acc_opened = $_POST['acc_opened'];
    $acc_additional = $_POST['acc_additional'];
    $acc_issued = $_POST['acc_issued'];
    $acc_closing = $_POST['acc_closing'];

    // Open the CSV file for appending
    $file = fopen('accommodation-stock.csv', 'a');

    // Add the new record to the CSV file
    fputcsv($file, array($acc_date, $acc_opened, $acc_additional, $acc_issued, $acc_closing));

    // Close the CSV file
    fclose($file);

    // Redirect to the same page to clear the form
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
  }
}
// Connect to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query the database for the menu items
$sql = "SELECT * FROM menu_items";
$result = $conn->query($sql);

// Store the menu items in an array
$menu_items = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $menu_items[] = $row;
  }
}

// Close the database connection
$conn->close();
?>
 