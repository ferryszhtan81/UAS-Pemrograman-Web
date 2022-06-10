
<?php
session_start();

require 'LogModel.php';

function tambahBarang(
    $nama,
    $gambar,
    $kategori,
    $stok,
    $koneksi
) {


    $query = "INSERT INTO info_barang(
            nama_barang,
            id_kategori
        ) VALUES ('$nama', $kategori)";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    }

    $fetch = mysqli_query($koneksi, "SELECT * FROM info_barang WHERE nama_barang = '$nama' AND id_kategori = $kategori");
    $info_b = mysqli_fetch_assoc($fetch);
    $info_id = $info_b['id_info_barang'];

    $query = "INSERT INTO barang(
        id_info_barang,
        stok
    ) VALUES ('$info_id', '$stok')";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        tambahLog();
        return 1;
    }
}

function tambahKategori(
    $nama,
    $koneksi
) {

    $query = "INSERT INTO info_barang(
            nama_kategori
        ) VALUES ('$nama')";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        tambahKategoriLog();
        return 1;
    }
}

function updateBarang(
    $id,
    $nama,
    $kategori,
    $stok,
    $koneksi
) {

    $fetch = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang=$id");
    $info_b = mysqli_fetch_assoc($fetch);
    $info_id = $info_b['id_info_barang'];

    $query = "UPDATE info_barang
        SET nama_barang = '$nama',
            id_kategori = $kategori
        WHERE id_info_barang = $info_id";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    }

    $query = "UPDATE barang
    SET stok = $stok
    WHERE id_barang = $id";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        updateLog();
        return 1;
    }
}

function ambilBarang($koneksi)
{
    $fetch = mysqli_query($koneksi, "SELECT * FROM barang");
    $i = 0;
    while ($row = mysqli_fetch_assoc($fetch)) {
        $rows[$i] = $row;
        $i++;
    }
    if ($i != 0) {
        return $rows;
    } else {
        return false;
    }
}

function ambilInfoBarang($koneksi)
{
    $fetch = mysqli_query($koneksi, "SELECT * FROM info_barang");
    $i = 0;
    while ($row = mysqli_fetch_assoc($fetch)) {
        $rows[$i] = $row;
        $i++;
    }
    if ($i != 0) {
        return $rows;
    } else {
        return false;
    }
}

function ambilNamaKategori($koneksi, $id)
{
    $fetch = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori = $id");
    $row = mysqli_fetch_assoc($fetch);
    return $row;
}

function ambilSatuBarang($koneksi, $id)
{
    $fetch = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang=$id");
    $row = mysqli_fetch_assoc($fetch);
    return $row;
}

function ambilSatuInfoBarang($koneksi, $id)
{
    $fetch = mysqli_query($koneksi, "SELECT * FROM info_barang WHERE id_info_barang=$id");
    $row = mysqli_fetch_assoc($fetch);
    return $row;
}

function hapusBarang($id, $koneksi)
{

    $fetch = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang=$id");
    $info_b = mysqli_fetch_assoc($fetch);
    $info_id = $info_b['id_info_barang'];

    $query = "DELETE FROM barang WHERE id_barang=$id";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    }

    $fetch = mysqli_query($koneksi, "SELECT * FROM info_barang WHERE id_info_barang=$info_id");
    $info_b = mysqli_fetch_assoc($fetch);
    $nama = $info_b['nama_barang'];

    $query = "DELETE FROM info_barang WHERE id_info_barang=$info_id";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        hapusLog($koneksi, $nama);
        return 1;
    }
}
