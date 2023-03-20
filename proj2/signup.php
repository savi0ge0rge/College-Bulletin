<?php
$showalert = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'partials/dbconnect.php';
  $username = $_POST["username"];
  $depatrment = $_POST["department"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  //$exists=false;
  
  //Check whether this username exists
  $existSql = "SELECT * FROM `users` WHERE username = '$username'";
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);
  if($numExistRows > 0){
	  //$exists = true;
	  $showerror = "Username Already Exists";
  }
  else{
		//$exists = false;
	if(($password == $cpassword)){
    $sql = "INSERT INTO `users` (`username`, `department`, `password`, `date`) 
    VALUES ('$username', '$depatrment', '$password', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if ($result){
      $showalert = true;
    }
  }
  else{
    $showerror = "Passwords do not match";
  }

}
  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>SignUp</title>
  </head>
  <body>
    <?php require 'partials/_nav.php'?>
    <?php
    if($showalert){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>You have been registered successfully!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
    if($showerror){
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> '. $showerror .'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
    <div class="container">
        <h1 class="text-center">Signup To FCRIT BULLETIN</h1>
        <form action="/proj2/signup.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <input type="department" class="form-control" id="department" name="department" placeholder="Department">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Password">
                <small id="emailHelp" class="form-text text-muted">Make sure to type the same password as above</small>
            </div>
            <button type="submit" class="btn btn-primary">Signup</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>