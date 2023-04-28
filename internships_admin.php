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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Placement and Internship</title>
    <link rel="stylesheet" href="internships_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <style>
        .table1 table {
            margin-right: 90px;
            font-size: large;
            border: 3px solid black;
            background-color: white ;
            border-radius: 5px;
        }

        h1 {
            margin-right: 60px;
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        .table1 td {
            background-color: white ;
            border: 3px solid black;
            font-weight: lighter;
        }

        .table1 th,
        .table1 td {
            font-weight: bold;
            border: 3px solid black;
            padding: 10px;
            text-align: center;
        }

        .placement-content {
            color: rgb(0, 0, 0);
            margin: auto;
            margin-top: 2%;
            margin-bottom: 2%;
            width: auto;
            background: #ffffff;
            border-radius: 5px;
            padding: 25px;
            font-size: 25px;
            box-shadow: 7px 7px 12px rgba(0, 0, 0, 0.05);
        }

        .placement-content tr {
            list-style: none;
            font-size: 16px;
        }

        .btnAdd {
            margin: 30px 10px 0px 0px;
            font-size: 16px;
        }

        .placement-content tr td {
            color: rgb(0, 0, 0);
            white-space: nowrap;
            text-align: center;
        }

        .placement-container {
            display: flex;
            align-items: center;
        }

        .placement-container .news_events {
            text-align: start;
            display: flex;
            margin-bottom: 10px;
        }

        .btnAdd td {
            padding-right: 15px
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
        }

        .placement-container .row1 {
            padding-bottom: 20px;
        }

        .placement-container table{
            border: none solid white;
        }
    </style>
</head>

<body>
    <div class="placement-content">
        <h2>Placement Events Updates</h2>
        <div class="placement-container">
            <form action="internships_admin.php" method="post" name="myform" id="myform">
                
                <table id="blacklistgrid" >
                    <tr class="row1" id="Row1">
                        <td>
                            Date
                        </td>
                        <td>
                            Time
                        </td>
                        <td>Information</td>
                    </tr>
                    <tr id="Row2">
                        <td>
                            <input type="date" name="date" id="date" class="date">
                        </td>
                        <td>
                            <input type="time" name="time" id="time" class="time">
                        </td>
                        <td>
                            <textarea type="text" class="news_events" placeholder="Enter Placement News/Updates"
                                name="news_events" id="news_events">
                </textarea>
                        </td>
                    </tr>
                </table>

                <input class="btn" type="submit"></input>
            </form>
        </div>
    </div>
    <section class="table1">
        
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr><th colspan="3">Placement/Intenrships Events</th></tr>
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