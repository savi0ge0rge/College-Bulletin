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
            margin-right: 50px;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',' Calibri', 'Trebuchet MS','sans-serif';
        }

        td {
            background-color: #E4F5D4;
            border: 1px solid black;
            font-weight: lighter;
        }


        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <header>Upload Certificates</header>
        <form action="#">
            <input class="file-input" type="file" name="file" hidden>
            <i class="fas fa-cloud-upload-alt"></i>
            <p>Browse File to Upload</p>
        </form>
        <section class="progress-area"></section>
        <section class="uploaded-area"></section>
        <script src="internships_student.js"></script>
    </div>
    <section class="table1">
        <h1>Profile Table</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Date_Time</th>
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
                        <?php echo $rows['date_time']; ?>
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