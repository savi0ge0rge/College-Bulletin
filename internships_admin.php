<?php
$date = $_POST['date'];
$time = $_POST['time'];
$news_events = $_POST['news_events'];

// Database connection
$conn = new mysqli('localhost', 'root', 'sylvester02', 'fcrit_bulletin_admin');
if ($conn->connect_error) {
	echo "$conn->connect_error";
	die("Connection Failed : " . $conn->connect_error);
} else {
	$stmt = $conn->prepare("insert into place_intern_news( date, time, news_events ) values(?, ?, ?)");
	$stmt->bind_param("iis", $date, $time, $news_events);
	$execval = $stmt->execute();
	echo $execval;
	echo "Registration successfully...";
	$stmt->close();
	$conn->close();
}
?>