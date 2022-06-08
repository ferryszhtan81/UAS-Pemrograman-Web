<?php
session_start();

function ambilDataLog($koneksi)
{
    $fetch = mysqli_query($koneksi, "SELECT * FROM log");
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
    $fetch = mysqli_query($koneksi, "SELECT nama_user FROM user WHERE id = $id");
    $result = mysqli_fetch_assoc($fetch);
    return $result['nama_user'];
}

function loginLog($koneksi)
{
}

function tambahLog($koneksi)
{
}

function updateLog($koneksi)
{
}

function hapusLog($koneksi)
{
}

function tambahKategoriLog($koneksi)
{
}
