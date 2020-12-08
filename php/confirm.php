<html>
<body>
<?php #var_dump($_POST); ?>
Thank you for submitting your travel agent contact request! Here is the information you submitted:

Client Name: <?php echo $_POST["firstName"] . " " . $_POST["lastName"]; ?><br>
Client Phone Number: <?php echo $_POST["phoneNumber"]; ?><br>
Client Email: <?php echo $_POST["emailAddress"]; ?><br>
Number of Adults: <?php echo $_POST["numberOfAdults"]; ?><br>
Number of Children: <?php echo $_POST["numberOfChildren"]; ?><br>
Destination: <?php echo $_POST["destination"]; ?><br>
Travel Dates: <?php echo $_POST["tripDate"]; ?><br>
Interested Activities: <?php echo $_POST[""]; ?><br>

An agent will be in touch with you soon!

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FormData";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS FormData";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
}

$sql = "CREATE TABLE IF NOT EXISTS MyClients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
phonenumber CHAR(15) NOT  NULL,
email VARCHAR(50) NOT NULL,
adults INT(2),
children INT(2),
destination VARCHAR(30),
dates DATE,
activities VARCHAR(512)
);";

if ($conn->query($sql) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO MyClients (
  firstname,
  lastname,
  phonenumber,
  email,
  adults,
  children,
  destination,
  dates,
  activities
) VALUES (?,?,?,?,?,?,?,?,?)";
$stmt= $conn->prepare($sql);
$placeholder = "placeholder";
$stmt->bind_param("ssssiisss",
  $_POST["firstName"],
  $_POST["lastName"],
  $_POST["phoneNumber"],
  $_POST["emailAddress"],
  $_POST["numberOfAdults"],
  $_POST["numberOfChildren"],
  $_POST["destination"],
  $_POST["tripDate"],
  $placeholder
);
$stmt->execute();

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
}

$conn->close();

?>
</body>
</html>