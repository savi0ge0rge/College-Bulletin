<?php
// Username is root
$user = 'root';
$password = 'sylvester02';

// Database name is geeksforgeeks
$database = 'fcrit_bulletin_admin';

// Server is localhost with
// port number 3306
$servername = 'localhost:3306';
$mysqli = new mysqli(
    $servername,
    $user,
    $password,
    $database
);

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
        $mysqli->connect_errno . ') ' .
        $mysqli->connect_error);
}

// SQL query to select data from database
$sql = " SELECT * FROM events_news ORDER BY id DESC ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Event</title>
	<link rel="stylesheet" href="event_student.css">
</head>

<body>
	<section>
		<div class="leftBox">
			<div class="content">
				<h1>
					Events and Shows
				</h1>

				<p>
					<iframe
						src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23E67C73&ctz=Asia%2FKolkata&src=Mjg3NGZmNDI2ZGMxYTllNTE4NmJmM2JlMTZjMGMzNGIyYjliZGI4MzZkNTJiN2RiMWEzNDA4NDgwYTJlNDU3M0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=ZW4uaW5kaWFuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&color=%23616161&color=%237986CB"
						style="border-width:0" width="500" height="550" frameborder="0" scrolling="no"></iframe>
				</p>

			</div>
		</div>

		<div class="events">
			<ul>
				<li>
					<div class="time">
						<h2>
							26 <br><span>January</span>
						</h2>
					</div>
					<div class="details">
						<h3>
							What event is happening?
						</h3>

						<p>
							REPUBLIC DAY CELEBRATION
						</p>


						<a href="#">View Details</a>
					</div>
					<div style="clear: both;"></div>
				</li>

				<li>
					<div class="time">
						<h2>
							27 <br><span>March</span>
						</h2>
					</div>
					<div class="details">
						<h3>
							What event is happening?
						</h3>

						<p>
							ETAMX FROM 27 TO 30
						</p>

						<a href="#">View Details</a>
					</div>
					<div style="clear:both;"></div>
				</li>

				<li>
					<div class="time">
						<h2>
							15 <br><span>August</span>
						</h2>
					</div>
					<div class="details">
						<h3>
							What event is happening?
						</h3>

						<p>
							INDEPENDENCE DAY CELEBRATION
						</p>


						<a href="#">View Details</a>
					</div>
					<div style="clear:both;"></div>
				</li>
			</ul>
		</div>
	</section>
	<table>
		<tr>
			<th colspan="3">Placement/Intenrships Events</th>
		</tr>
		<tr>
			<th>Date</th>
			<th>Time</th>
			<th>Information</th>
		</tr>
		<!-- PHP CODE TO FETCH DATA FROM ROWS -->
		<?php
		// LOOP TILL END OF DATA
		while ($rows = $result->fetch_assoc()) {
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
				ROW OF EVERY COLUMN -->
				<td>
					<?php echo $rows['date']; ?>
				</td>
				<td>
					<?php echo $rows['time']; ?>
				</td>
				<td>
					<?php echo $rows['news_events']; ?>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
</body>

</html>