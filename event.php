<?php
$date = $_POST['date'];
$month = $_POST['month'];
$events = $_POST['events'];

// Database connection
$conn = new mysqli('localhost', 'root', 'sylvester02', 'fcrit_bulletin_admin');
if ($conn->connect_error) {
	echo "$conn->connect_error";
	die("Connection Failed : " . $conn->connect_error);
} else {
	$stmt = $conn->prepare("insert into events_news( date, month, events ) values(?, ?, ?)");
	$stmt->bind_param("sss", $date, $time, $events);
	$execval = $stmt->execute();
	echo $execval;
	echo "Registration successfully...";
	$stmt->close();
	$conn->close();
}
?>