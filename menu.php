<?php
// Create a new PDO instance to connect to the database
$db = new PDO('mysql:host=localhost;dbname=your_database_name', 'your_username', 'your_password');

// Prepare a query to retrieve all menu items from the database
$query = $db->prepare('SELECT * FROM menu');

// Execute the query and fetch all results as an associative array
$menuItems = $query->execute();
$menuItems = $query->fetchAll(PDO::FETCH_ASSOC);

// Output the menu items as an HTML table
echo '<table>';
echo '<thead><tr><th>Item Number</th><th>Item Name</th><th>Item Price</th></tr></thead>';
echo '<tbody>';
foreach ($menuItems as $menuItem) {
    echo '<tr>';
    echo '<td>' . $menuItem['id'] . '</td>';
    echo '<td>' . $menuItem['item_name'] . '</td>';
    echo '<td>' . $menuItem['item_price'] . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>
