<!DOCTYPE html>
<?php
require '../helper/Koneksi.php';
require '../model/KatalogModel.php';
require '../helper/Model.php';

isLogin("HalamanHome.php");
$data = ambilBarang($koneksi);
$dataInfo = ambilInfoBarang($koneksi);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Katalog</title>
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

                <b class="judul">Katalog Barang</b>


                <b class="admin"><?php echo $_SESSION["username"] ?></b>
                <a href="../helper/Logout.php">
                    <button type="button" name="logout">Logout</button>
                </a>

            </div>
            <form method="POST" action="FormKatalog.php">
                <button type="submit" class="addbutton" name="tambah" value="tambah">+ Tambah</button>


                <table class="content-table" data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-offset="0" tabindex="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>GAMBAR</th>
                            <th>NAMA</th>
                            <th>KATEGORI</th>
                            <th>STOK</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php foreach ($data as $data) : ?>
                            <tr>
                                <?php $info = ambilSatuInfoBarang($koneksi, $data['id_info_barang']);
                                $kategori = ambilNamaKategori($koneksi, $info['id_kategori']); ?>

                                <td width="3%"><?php echo $nomor ?></td>
                                <td width="20%"><img src="../res/<?php echo $info['gambar'] ?>" height="100px" width="100px"></td>
                                <td width="20%"><?php echo $info['nama_barang'] ?></td>
                                <td><?php echo $kategori['nama_kategori'] ?></td>
                                <td><?php echo $data['stok'] ?></td>

                                <td>
                                    <button type="submit" class="editbutton" name="edit" value="<?php echo $data['id_barang'] ?>">Edit</button>
                                    <a onclick="return confirm('Yakin Hapus?')"><button type="submit" class="hapusbutton" name="hapus" value="<?php echo $data['id_barang'] ?>">Hapus</button></a>
                                </td>
                            </tr>

                            <?php $nomor++; ?>
                        <?php endforeach ?>
                    </tbody>
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
