<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
	header("location: login.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>FCRIT Bulletin<?php $_SESSION['username']?></title>
   <link rel="stylesheet" href="dash_student.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
	<?php require 'partials/_nav.php' ?>
	Welcome<?php $_SESSION['username']?>
	
   <div class="wrapper">
      <input type="checkbox" id="btn" hidden>
      <label for="btn" class="menu-btn">
         <i class="fas fa-bars"></i>
         <i class="fas fa-times"></i>
      </label>
      <nav id="sidebar">
         <div class="title">
            Dashboard
         </div>
         <ul class="list-items">
            <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="profile.html"><i class="fas fa-sliders-h"></i>Profile</a></li>

            <li><a href="upload.html"><i class="fas fa-cog"></i>Upload Documents</a></li>
            <li><a href="chat_website.html"><i class="fas fa-stream"></i>Department chat</a></li>
            <li><a href="upload.html"><i class="fas fa-user"></i>Placement & Internships</a></li>
            <li><a href="eventnew.html"><i class="fas fa-globe-asia"></i>College News & Events</a></li>
            <img class="logo" src="fcritlogo.png" alt="">
            <div class="icons">
               <a href="https://www.facebook.com/FCRITofficial/"><i class="fab fa-facebook-f">
                  </i></a>
               <a href="https://www.youtube.com/@fcritvashiofficial4407"><i class="fab fa-youtube"></i></a>
            </div>
         </ul>

      </nav>
   </div>
   <div class="wrapper1">
      <header>
         <img src="BG1.jpg" class="background">
         <div class="foreground">WELCOME<br>TO<br> FCRIT BULLETIN</div>
      </header>
      <section>
         <h2>College Information</h2><br>
         <div class="addr">
            <h3>Fr. C. Rodrigues Institute of Technology
            </h3>Agnel Technical Education Complex
            <br>Sector 9-A, Vashi, Navi Mumbai,<br>Maharashtra, India PIN - 400703
         </div>
         <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15082.928435032509!2d72.98297098368039!3d19.0755124944209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c6cae0d8c5ab%3A0xbbf4481d662ca2d8!2sFr.%20Conceicao%20Rodrigues%20Institute%20of%20Technology!5e0!3m2!1sen!2sin!4v1677515634408!5m2!1sen!2sin"
            width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

         <div class="contact-form">
            <form action="contactus.php" method="post">
               <label for="name">Name:</label>
               <input type="text" id="name" name="name" required>
               <label for="email">Email:</label>
               <input type="email" id="email" name="email" required>
               <label for="message">Message:</label>
               <textarea id="message" name="message" required placeholder="Type your message/query here"></textarea>
               <div class="contact">Contact Us</div>
               <input type="submit" value="Submit">
            </form>
         </div>
        
      </section>
      <section class="end">Developed by the Reserve Squad </section>
   </div>
</body>

</html>