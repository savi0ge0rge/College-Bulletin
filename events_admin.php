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
	<title>Admin Event</title>
	<link rel="stylesheet" href="event_admin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
	</script>
	<style>
	body {
    margin: 10;
    padding: 5;
}

/* Styling section, giving background
    image and dimensions */
section {
    width: 100%;
    height: 100vh;

}

/* Styling the left floating section */
section .leftBox {
    width: 50%;
    height: 100%;
    float: left;
    padding: 50px;
    box-sizing: border-box;
}

/* Styling the background of
    left floating section */
section .leftBox .content {
    color: #fff;
    background: rgba(0, 0, 0, 0.5);
    padding: 40px;
    transition: .5s;
}

/* Styling the hover effect
    of left floating section */
section .leftBox .content:hover {
    background: #ff25a1;
}

/* Styling the header of left
    floating section */
section .leftBox .content h1 {
    margin: 0;
    padding: 0;
    font-size: 50px;
    text-transform: uppercase;
}

/* Styling the paragraph of
    left floating section */
section .leftBox .content p {
    margin: 10px 0 0;
    padding: 0;
}

/* Styling the three events section */
section .events {
    position: relative;
    width: 50%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    float: right;
    box-sizing: border-box;
    margin-top: 130px;
}

/* Styling the links of
the events section */
section .events ul {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    margin: 0;
    padding: 40px;
    box-sizing: border-box;
}

/* Styling the lists of the event section */
section .events ul li {
    list-style: none;
    background: #fff;
    box-sizing: border-box;
    height: 200px;
    margin: 15px 0;
}

/* Styling the time class of events section */
section .events ul li .time {
    position: relative;
    padding: 20px;
    background: #262626;
    box-sizing: border-box;
    width: 30%;
    height: 100%;
    float: left;
    text-align: center;
    transition: .5s;
}

/* Styling the hover effect
    of events section */
section .events ul li:hover .time {
    background: #ff0000;
}

/* Styling the header of time
    class of events section */
section .events ul li .time h2 {
    position: absolute;
    margin: 0;
    padding: 0;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #fff;
    font-size: 60px;
    line-height: 30px;
}

/* Styling the texts of time
class of events section */
section .events ul li .time h2 span {
    font-size: 30px;
}

/* Styling the details
class of events section */
section .events ul li .details {
    padding: 20px;
    background: #fff;
    box-sizing: border-box;
    width: 70%;
    height: 100%;
    float: left;
}

/* Styling the header of the
details class of events section */
section .events ul li .details h3 {
    position: relative;
    margin: 0;
    padding: 0;
    font-size: 22px;
}

/* Styling the lists of details
class of events section */
section .events ul li .details p {
    position: relative;
    margin: 10px 0 0;
    padding: 0;
    font-size: 16px;
}

/* Styling the links of details
class of events section */
section .events ul li .details a {
    display: inline-block;
    text-decoration: none;
    padding: 10px 15px;
    border: 1.5px solid #262626;
    margin-top: 8px;
    font-size: 18px;
    transition: .5s;
}

/* Styling the details class's hover effect */
section .events ul li .details a:hover {
    background: #000000;
    color: #fff;
    border-color: #e91e63;
}

/*New event backend*/
.event-content {
    margin: 130px;
    background-color: #e91e63;
    width: max-content;
    height: max-content;
    display:inline-block;
    border-radius: 10px;
}

.event-content tr {
    list-style: none;
    font-size: 16px;
   
}

.btnAdd {
    margin: 30px 10px 0px 10px;
    font-size: 16px;
}

.event-content tr td {
    color: rgb(0, 0, 0);
    font-size: 16px;
    white-space: nowrap;
    text-align: center;
    padding-bottom: 7px;
   
}

.event-container {
    display: flex;
    align-items: center;
    padding: 120px;
   
}

.event-container .time {
    min-width: 90px;
    text-align: center;
}

.event-container .news_events {
    text-align: start;
    display: flex;
    margin-bottom: 10px;
}

td {
    padding-right: 15px;
    padding-left: 10px;
 
}

.btn {
    width: 80px;
    height: 35px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(to right, rgb(232, 76, 193), rgb(82, 68, 231));
    border: none;
    margin: 20px 0px 0px 4px;
    border-radius: 20px;
    cursor: pointer;
    margin:  20px 0px 20px 10px;
}
.event-content .row1 td {
    color: white;
    font-size: 18px;
}

.head {
    font-size: 35px;
    color: white;
    margin-left: 10px;
    margin-top: 5px;
}</style>
	<script>
		$(document).ready(function () {
			$('#btnAdd').click(function () {
				var count = 1, first_row = $('#Row2');
				while (count-- > 0) first_row.clone().appendTo('#blacklistgrid');
			});
			$('#btnAddCol').click(function () {
			});
		});
	</script>
</head>

<body>
	<section>
		<div class="leftBox">
			<div class="content">
				<h1>College Events</h1>
				<p>
					<iframe
						src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23E67C73&ctz=Asia%2FKolkata&src=Mjg3NGZmNDI2ZGMxYTllNTE4NmJmM2JlMTZjMGMzNGIyYjliZGI4MzZkNTJiN2RiMWEzNDA4NDgwYTJlNDU3M0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=ZW4uaW5kaWFuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&color=%23616161&color=%237986CB"
						style="border-width:0" width="500" height="500" frameborder="0" scrolling="no"></iframe>
				</p>
			</div>
		</div>
		<div class="event-content">
			<div class="head">Add College Events<br></div>
			<form id="event-container" action="event.php" method="post">
				<button type="button" class="btnAdd" id="btnAdd">Add Placement News/Updates</button></br></br>
				<table id="blacklistgrid">
					<tr class="row1" id="Row1">
						<td>Date</td>
						<td>Month, Year</td>
						<td>Event Name</td>
					</tr>
					<tr id="Row2">
						<td>
							<input type="number" name="date" id="date" class="date" min="1" max="31">
						</td>
						<td><input type="month" id="month" name="month" min="2022-12" max="2050-12"></td>
						<td>
							<textarea type="text" class="events" placeholder="Event Name, Information"
								name="events" id="events"></textarea>
						</td>
					</tr>
				</table>
				<input class="btn" type="submit"></input>
		</div>
		</form>
	</section>
</body>

</html>