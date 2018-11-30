<?php
    session_start();
    unset($_SESSION['cart'][$_GET['key']]);
    header("Location: ".$_SERVER['HTTP_REFERER'] );
    exit();

?>
