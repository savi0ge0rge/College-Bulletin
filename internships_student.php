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
$sql = " SELECT * FROM place_intern_news ORDER BY id DESC ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Placement & Internship Student</title>
    <link rel="stylesheet" href="internships_student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <style>
        table {
            margin-right: 80px;
            font-size: large;
            border: 3px solid black;
            display: flex;
            align-items: center;
            background-color: white ;
            margin-left: 350px;
            border-radius: 7px;   
        }

        h1 {
            margin-right: 60px;
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
            background-color: white ;
            border: 3px solid black;
            font-weight: lighter;
        }


        th,
        td {
            font-weight: bold;
            border: 3px solid black;
            padding: 10px;
            text-align: center;
        }

        .cont1 {
            background-color: white;
            padding: 10px;
            height: max-content;
            width: max-content;
            margin-top: 50px;
            margin-left: 50px;
            align-items: center;
            border-radius: 7px;
        }

        .fas {
            color: blueviolet;
            font-size: 30px;
            padding: 10px;
        }

        .form-control {
            margin: 15px;
            padding: 10px;
        }
    
        .btn {
            width: max-content;
            margin: 15px auto;
            box-shadow: 0 0 20px 9px #ff61241f;
            background: linear-gradient(to right, rgb(232, 76, 193), rgb(82, 68, 231));
            border-radius: 20px;
        }

        .btn-text {
            background-color: transparent;
            border: none;
            padding: 10px;
            color: white    ;
            font-size: 18px;
           
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top:10px">
        <div class="cont1">
            <div class="card-header text-center">
                <h2 style="white-space: nowrap;">Upload Certificates here</h2>
                <h5>(This includes internship certificates,<br>resumes for placements, internship letters,etc)
                </h5>
            </div>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-input py-2">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter your name" name="username">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter your roll number" name="roll_number">
                    </div>
                    <div class="form-group">
                        <label for="file">
                            <i class="fas fa-cloud-upload-alt"></i> Upload Document
                        </label>
                        <input type="file" id="file" style="display:none;" name="file">

                    </div>
                    <div class="btn">
                        <input class="btn-text" type="submit" name="submit" value="Upload">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <section class="table1">

        <!-- TABLE CONSTRUCTION -->
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
    </section>

</body>

</html>