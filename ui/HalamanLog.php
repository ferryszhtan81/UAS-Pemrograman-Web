<!DOCTYPE html>
<?php
require '../helper/Koneksi.php';
require '../model/KatalogModel.php';
require '../helper/Model.php';

isLogin("HalamanLog.php");
$data = ambilDataLog($koneksi);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log User</title>
    <link rel="stylesheet" type="text/css" href="../css/PageStyle2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body class="modal-open">

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

                <b class="judul">Log User</b>


                <b class="admin"><?php echo $_SESSION["username"] ?></b>
                <a href="../helper/Logout.php">
                    <button type="button" name="logout">Logout</button>
                </a>

            </div>


            <table class="content-table" data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-offset="0" tabindex="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>AKSI</th>
                        <th>TANGGAL/WAKTU</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($data as $data) : ?>
                        <tr>
                            <?php $nama = ambilNamaUser($koneksi, $data['id_user']) ?>

                            <td width="3%"><?php echo $nomor ?></td>
                            <td width="20%"><?php echo $nama ?></td>
                            <td width="40%"><?php echo $data['aksi'] ?></td>
                            <td><?php echo $data['tanggal'] ?></td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php endforeach ?>

                </tbody>
            </table>
            <br><br>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
