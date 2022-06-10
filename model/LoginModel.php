<?php
session_start();
function login($no, $password, $koneksi)
{
    $query = "SELECT * FROM user WHERE nomor_user = $no;";
    $myQuery = mysqli_query($koneksi, $query);
    if ($myQuery) {
        $result  = mysqli_fetch_assoc($myQuery);
        if ($result != false) {
            if ($result['password_user'] == $password) {
                $_SESSION['username'] = $result['nama_user'];
                echo "<script> alert(\"Berhasil login\") </script>";
                echo "<script>window.location.href='HalamanHome.php'</script>";
            } else {
                echo "<script> alert(\"Nomor/password salah!\") </script>";
            }
        } else {
            echo "<script> alert(\"Error!\") </script>";
        }
    } else {
        echo "<script> alert(\"Nomor/password salah!\") </script>";
    }
}
