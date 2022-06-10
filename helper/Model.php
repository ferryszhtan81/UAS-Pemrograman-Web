<?php
function isLogin($page)
{

    if (isset($_SESSION['username'])) {
        if ($page == "FormLogin.php") {
            echo "<script>window.location.href='HalamanHome.php'</script>";
        }
    } else {
        if ($page != "FormLogin.php") {
            echo "<script>window.location.href='FormLogin.php'</script>";
        }
    }
}

function logout()
{
    unset($_SESSION['username']);
    echo "<script>window.location.href='../ui/FormLogin.php'</script>";
}
