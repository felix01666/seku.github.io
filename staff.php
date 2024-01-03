<?php

// Connect to your database
$servername = "localhost";
$id = "id";
$username = "name";
$time = "sign_in_time";
$time = "sign_out_time";
$dbname = "seku_guest_house";

$conn = new mysqli($servername, $id, $username, $time, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query the database for staff and time data
$sql = "SELECT staff.id, staff.name, time.sign_in_time, time.sign_out_time
        FROM staff
        INNER JOIN time ON staff.id = time.staff_id";

$result = $conn->query($sql);

// Generate the HTML table
echo "<table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Sign In Time</th>
            <th>Sign Out Time</th>
          </tr>
        </thead>
        <tbody>";

if ($result->num_rows > 0) {
  // Output data for each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>".$row["id"]."</td>
            <td>".$row["name"]."</td>
            <td>".$row["sign_in_time"]."</td>
            <td>".$row["sign_out_time"]."</td>
          </tr>";
  }
} else {
  echo "<tr><td colspan='4'>No records found</td></tr>";
}

echo "</tbody></table>";

// Close the database connection
$conn->close();

?>
