<!DOCTYPE html>
<?php
require '../helper/Koneksi.php';
require '../model/KatalogModel.php';
require '../helper/Model.php';

isLogin("HalamanHome.php");
$koneksi = mysqli_connect('localhost', 'root', '', 'minimarket');
$data = ambilBarang($koneksi);
$dataInfo = ambilInfoBarang($koneksi);

if (isset($_POST['btn_tambah'])) {
    tambahbarang($_POST['nama'], $_POST['gambar'], $_POST['stok'], $_POST['nama_kategori'], $koneksi);
    unset($_POST['btn_tambah']);
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Alam Admin</title>
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

                <b class="judul">Form Input Katalog</b>


                <b class="admin"><?php echo $_SESSION["username"] ?></b>
                <a href="../helper/Logout.php">
                    <button type="button" name="logout">Logout</button>
                </a>

            </div>
            
            <form method="post" class="form">
                <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>NAMA</td>
                    <td><input type="text" class="form-control" name="nama_barang" id="id_info_barang" required /></td>
                </tr>
                <tr>
                    <td>GAMBAR</td>
                    <td><input type="file" name="gambar" required /></td>
                </tr>
                <tr>
                    <td>STOK</td>
                    <td><input type="text" class="form-control" name="stok" id="id_info_barang" required /></td>
                </tr>
                    <tr>
                    <td>KATEGORI</td>
                    <td><input type="text" class="form-control" name="nama_kategori" id="id_kategori" required /></td>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-success" name="btn_tambah">Simpan</button></td>
                </tr>
                </table>
            </form>

            <br><br>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
