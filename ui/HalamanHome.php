<!DOCTYPE html>
<html lang="en">
<?php
require '../helper/Koneksi.php';
require '../model/LoginModel.php';
require '../helper/Model.php';

isLogin("HalamanHome.php");
?>

<head>
    <meta charset="UTF-8">
    <title>Beranda Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/PageStyle.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>

    <div class="wrapper">
        <div class="sidebar">
            <h2>SI Minimarket</h2>
            <div class="menu">
                <ul>
                    <li><a href="HalamanHome.php">Home</a></li>
                    <li><a href="HalamanKatalog.php">Katalog</a></li>
                    <li><a href="HalamanLog.php">Log</a></li>
                </ul>
            </div>
        </div>
        <div class="main_content">
            <div class="header1">
                <b><?php echo $_SESSION["username"] ?></b>
                <a href="../helper/Logout.php">
                    <button type="button" name="logout">Logout</button>
                </a>
            </div>
            <div class="header2">
                <b>Hello, <?php echo $_SESSION["username"] ?> </b>
            </div>

            <div class="container">
                <div class="col-1">
                    <div class="kotak"></div>
                    <br>
                    <h3><a href="HalamanKatalog.php">Katalog</a></h3>
                    <br>
                    <p>Lihat Katalog Barang Minimarket</p>
                </div>
                <div class="col-2">
                    <div class="kotak"></div>
                    <br>
                    <h3><a href="HalamanLog.php">Log</a></h3>
                    <br>
                    <p>Lihat Log Aktivitas</p>
                </div>
            </div>

        </div>
    </div>

</body>

</html>