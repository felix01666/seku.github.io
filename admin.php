<?php

// Connect to your database
$servername = "localhost";
$time = "sign_in_time";
$time = "sign_out_time";
$dbname = "seku_guest_house";

$conn = new mysqli($servername, $time, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = mysqli_query($conn, $sql);

// Check out the available reserved rooms
if (mysqli_num_rows($result) > 0) {
    // Display the reserved  rooms in a table
    echo "<h2>reserved rooms</h2>";
    echo "<id>";
    echo "<name>";
    echo "<ID number>";
    echo "<nationality>";
    echo "<Phone number>";
    echo "<date of arrival>";
    echo "<date of departure>";
    echo "<room category>";
    echo "<rate>";
    
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['id number']."</td><td>".$row['nationality']."</td><td>".$row['phone number']."</td>
      <td>".$row['date of arrival']."</td><td>".$row['date of departure']."</td><td>".$row['room category']."</td><td>".$row['rate']."</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
  } else {
    // If there are no reserved  rooms, message conveyed
    echo "<h2>No rooms reserved </h2>";
  }
  // Check out the available reserved rooms
if (mysqli_num_rows($result) > 0) {
    // Display the reserved  rooms in a table
    echo "<h2>reserved rooms</h2>";
    echo "<category>";
    echo "<number of rooms>";
    echo "<action>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row['category']."</td><td>".$row['number of rooms']."</td><td>".$row['action']."</td>
        </tr>";
      }
      echo "</tbody>";
      echo "</table>";
    }


// Check the staff records
if (mysqli_num_rows($result) > 0) {
  // Displaying the records of the staf on a table 
  echo "<h2>staff records</h2>";
  echo "<ID>";
  echo "<name>";
  echo "<position>";
  echo "<department >";
  echo "<contact>";
  echo "<action>";
  echo "</thead>";
  echo "<tbody>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['position']."</td><td>".$row['department ']."</td><td>".$row['contact']."</td><td>".$row['action']."</td></tr>";
  }
  echo "</tbody>";
  echo "</table>";
}

// MENU Management
// to insert data into the database 
//if (isset($_POST['insert']))
