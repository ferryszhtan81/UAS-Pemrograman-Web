<!DOCTYPE html>
<?php
require '../helper/Koneksi.php';
require '../model/KatalogModel.php';
require '../helper/Model.php';

isLogin("FormKatalog.php");
$kategori = ambilKategori($koneksi);

if (isset($_POST['simpan'])) {
    echo "<script>alert('Data Diproses!');</script>";
    if ($_POST['simpan'] == false) {
        tambahBarang(
            $_POST['nama'],
            $_POST['kategori'],
            $_POST['stok'],
            $koneksi
        );
    } else {
        updateBarang(
            $_POST['id_barang'],
            $_POST['nama'],
            $_POST['kategori'],
            $_POST['stok'],
            $koneksi
        );
    }
}

if (isset($_POST['tambah'])) {
    $isEdit = false;
    $title = "Input Barang Baru";
} else if (isset($_POST['edit'])) {
    $isEdit = true;
    $title = "Edit Barang";
    $data = ambilSatuBarang($koneksi, $_POST['edit']);
    $infoData = ambilSatuInfoBarang($koneksi, $data['id_info_barang']);
} else if (isset($_POST['hapus'])) {
    hapusBarang($_POST['hapus'], $koneksi);
    echo "<script>window.location.href='HalamanKatalog.php'</script>";
} else {
    echo "<script>window.location.href='HalamanKatalog.php'</script>";
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="../css/FormStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="main_content">
            <div class="header1">
                <b class="judul"><?= $title ?></b>
                <b class="admin"><?php echo $_SESSION['username'] ?></b>
                <a href="../config/logout.php">
                    <button type="button" name="logout">Logout</button>
                </a>
            </div>
        </div>
    </div>

    <br>
    <div class="container">
        <div class="card" style="box-shadow: 0 5px 10px rgba(65, 60, 60, 0.2);">
            <div class="card-header" style="background-color: #7C1212">
                <label></label>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">

                    <?php if ($isEdit) : ?>
                        <div class="form-group">
                            <input type="hidden" name="id_barang" class="form-control" value="<?= $data['id_barang'] ?>">
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label>Gambar Barang</label>
                        <input type="file" name="gambar" class="form-control" <?php if ($isEdit) : ?> disabled <?php else : echo "required";
                                                                                                            endif; ?>>
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama" <?php if ($isEdit) : ?> value="<?= $infoData['nama_barang'] ?>" <?php endif; ?> required>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>

                        <?php foreach ($kategori as $kategori) : ?>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kategori" id="<?= $kategori['nama_kategori'] ?>" value="<?= $kategori['id_kategori'] ?>" <?php if ($isEdit) : if ($infoData['id_kategori'] == $kategori['id_kategori']) : ?> checked <?php endif;
                                                                                                                                                                                                                                                                endif; ?> required>
                                <label class="form-check-label" for="<?= $kategori['nama_kategori'] ?>">
                                    <?= $kategori['nama_kategori'] ?>
                                </label>
                            </div>

                        <?php endforeach ?>

                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <br>
                        <input type="number" name="stok" class="form-control" min="1" max="9999" <?php if ($isEdit) : ?> value="<?= $data['stok'] ?>" <?php endif; ?> required>
                    </div>
                    <br>
                    <p align="right">
                        <button class="btn btn-success" type="submit" name="simpan" value="<?= $isEdit ?>">Simpan</button>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <br><br>
</body>

</html>
