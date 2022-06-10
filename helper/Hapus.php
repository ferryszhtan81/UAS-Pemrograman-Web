<?php
require '../model/KatalogModel.php';
require 'Model.php';
require 'Koneksi.php';

hapusBarang($_POST['hapus'], $koneksi);
