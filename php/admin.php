<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FormData";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname, phonenumber, email, adults, children, destination, dates, activities FROM MyClients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo "Client Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	echo "Client Phone Number: " . $row["phonenumber"]. "<br>";
	echo "Client Email: " . $row["email"]. "<br>";
	echo "Number of Adults: " . $row["adults"]. "<br>";
	echo "Number of Children: " . $row["children"]. "<br>";
	echo "Destination: " . $row["destination"]. "<br>";
	echo "Travel Dates: " . $row["dates"]. "<br>";
	echo "Interested Activities: " . $row["activities"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
