<?php
session_start();

function ambilDatetime()
{
    date_default_timezone_set('Asia/Jakarta');
    $dt = date("Y-m-d H:i:s");
    return $dt;
}

function ambilDataLog($koneksi)
{
    $fetch = mysqli_query($koneksi, "SELECT * FROM log ORDER BY tanggal DESC");
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

function ambilNamaUser($koneksi, $id)
{
    $fetch = mysqli_query($koneksi, "SELECT nama_user FROM user WHERE id_user = $id");
    $result = mysqli_fetch_assoc($fetch);
    return $result['nama_user'];
}

function ambilIdUser($koneksi, $nama)
{
    $fetch = mysqli_query($koneksi, "SELECT id_user FROM user WHERE nama_user = '$nama'");
    $result = mysqli_fetch_assoc($fetch);
    return $result['id_user'];
}

function loginStatusLog($koneksi, $isLogin)
{
    if ($isLogin) {
        $aksi = "Login";
    } else {
        $aksi = "Logout";
    }
    $tanggal = ambilDatetime();
    $nama = $_SESSION['username'];
    $id_user = ambilIdUser($koneksi, $nama);
    $query = "INSERT INTO log(id_user, aksi, tanggal) VALUES($id_user, '$aksi', '$tanggal');";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        return 1;
    }
}

function tambahLog($koneksi, $nama_barang)
{
    $aksi = "Menambah Barang: $nama_barang";

    $tanggal = ambilDatetime();
    $nama = $_SESSION['username'];
    $id_user = ambilIdUser($koneksi, $nama);

    $query = "INSERT INTO log(id_user, aksi, tanggal) VALUES($id_user, '$aksi', '$tanggal');";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        return 1;
    }
}

function updateLog($koneksi, $nama_barang)
{
    $aksi = "Mengedit Barang: $nama_barang";

    $tanggal = ambilDatetime();
    $nama = $_SESSION['username'];
    $id_user = ambilIdUser($koneksi, $nama);

    $query = "INSERT INTO log(id_user, aksi, tanggal) VALUES($id_user, '$aksi', '$tanggal');";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        return 1;
    }
}

function hapusLog($koneksi, $nama_barang)
{
    $aksi = "Menghapus Barang: $nama_barang";

    $tanggal = ambilDatetime();
    $nama = $_SESSION['username'];
    $id_user = ambilIdUser($koneksi, $nama);

    $query = "INSERT INTO log(id_user, aksi, tanggal) VALUES($id_user, '$aksi', '$tanggal');";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        return 1;
    }
}
