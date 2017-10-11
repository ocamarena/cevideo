<?php
session_start();
if ($_SESSION['logged'] == true) {
    include 'header.php';
    include 'navbar.php';
    if ($_SESSION['new'] == 'yes') {
        include 'changepass.php';
    } else {
        if ($_GET['page'] == 'account') {
            include 'account.php';
        } elseif ($_GET['page'] == 'mihotel') {
            include 'mihotel.php';
        } elseif ($_GET['page'] == 'usuarios') {
            include 'usuarios.php';
        } elseif ($_GET['page'] == 'hoteles') {
            include 'hoteles.php';
        } elseif ($_GET['page'] == 'cambiarcontrasena') {
            include 'changepass.php';
        } elseif ($_GET['page'] == 'clips') {
            include 'clips.php';
        } elseif ($_GET['page'] == 'directorios') {
            include 'directorios.php';
        } else {
            include 'home.php';
        }
    }
    include 'footer.php';
} else {
    include 'header.php';
    include 'login.php';
}
