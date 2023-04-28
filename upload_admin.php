<?php include 'dbcon.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url(BG_image.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
                ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }


        .col-lg-6 {
            margin: 150px 0px 0px 380px;
            border-radius: 7px;
        }
    </style>
</head>

<div class="col-lg-6 col-md-6 col-12">
    <div class="card">
        <div class="card-header text-center">
            <h4>Records from Database</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table>
                    <thead>
                        <th>ID</th>
                        <th>UserName</th>
                        <th>Roll Number</th>
                        <th>FileName</th>
                    </thead>
                    <tbody>
                        <?php
                        $selectQuery = "select * from file_upload";
                        $squery = mysqli_query($db, $selectQuery);

                        while (($result = mysqli_fetch_assoc($squery))) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $result['id']; ?>
                                </td>
                                <td>
                                    <?php echo $result['username']; ?>
                                </td>
                                <td>
                                    <?php echo $result['roll_number']; ?>
                                </td>

                                <td>
                                    <?php echo $result['file_name']; ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>

</html>