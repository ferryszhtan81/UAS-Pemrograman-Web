<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'minimarket');
if (!$koneksi) {
    echo 'Gagal terhubung';
}
