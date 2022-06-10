<?php
require '../helper/Koneksi.php';
require '../model/KatalogModel.php';
require '../helper/Model.php';

isLogin("HalamanHome.php");
$koneksi = mysqli_connect('localhost', 'root', '', 'minimarket');
$data = ambilBarang($koneksi);
$dataInfo = ambilInfoBarang($koneksi);

if($_POST){
    hapusBarang($id, $koneksi);
}
?>
