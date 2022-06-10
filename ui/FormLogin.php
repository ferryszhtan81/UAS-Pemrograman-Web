<!DOCTYPE html>
<html>
<?php
require '../helper/Koneksi.php';
require '../model/LoginModel.php';
require '../helper/Model.php';




if (isset($_POST['btn_login'])) {
    $koneksi = mysqli_connect('localhost', 'root', '', 'minimarket');
    login($_POST['nomor_member'], $_POST['password'], $koneksi);
    unset($_POST['btn_login']);
}
//isLogin("FormLogin.php");

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/Style.css">
</head>

<body>
    <img src="../res/bg_minimarket.jpg">
    <div class="center border">
        <form method="POST" class="form">
            <h3>Sistem Informasi Minimarket</h3>
            <br>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Nomor" name="nomor_member" id="nomor_member" required>
                <br>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                <br><br>
                <button type="submit" class="btn btn-success" name="btn_login" value="login">Login</button>
            </div>
        </form>
    </div>
</body>

</html>