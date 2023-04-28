<?php include 'dbcon.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="upload.css">
    <style>
        body {
            background-image: url(BG_image.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        .btn {
            width: 120px;
            margin: 35px auto;
            position: relative;
            box-shadow: 0 0 20px 9px #ff61241f;
            background: linear-gradient(to right, rgb(232, 76, 193), rgb(82, 68, 231));
            border-radius: 30px;
        }

        .btn-text {
            background-color: transparent;
            border: none;
        }
        strong {
            padding-top: 15px;
            font-size: 22px;
        }
        .fas{
            margin-left: 12px;  
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
        .fas{
            color: blueviolet;
            font-size: 30px;
        }
        
        .cont1{
            height: max-content;
            width: max-content;
            background-color: white;
            position: absolute;
            padding: 15px;
            margin-top: 100px;
            border-radius: 7px; 
        }
        .cont2{
            height: max-content;
            width: max-content;
            background-color: white;
            float: right;
            margin-top: 100px;
            margin-right: 40px;
            border-radius: 7px; 
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top:10px">
        <div class="cont1">
        <div class="card-header text-center">
            <h4>Upload your Douments here</h4>
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

    <div class="cont2">
    <div class="card">
        <div class="card-header text-center">
            <h4>Uploaded Documents</h4>
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
</div></body>

</html>