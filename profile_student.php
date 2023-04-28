<?php
	$fullName = $_POST['fullName'];
	$email = $_POST['email'];
	$roll_number = $_POST['roll_number'];
	$mobile_number = $_POST['mobile_number'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$pincode = $_POST['pincode'];

	// Database connection
	$conn = new mysqli('localhost','root','sylvester02','fcrit_bulletin_admin');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into profile(fullName, email, roll_number, mobile_number, gender, dob, address, city, country, pincode) values( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssiisssssi", $fullName, $email, $roll_number, $mobile_number, $gender, $dob, $address, $city, $country, $pincode);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>