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
        } else if ($_GET['page'] == 'mihotel') {
            include 'mihotel.php';
        } else if ($_GET['page'] == 'usuarios') {
            include 'usuarios.php';
        } else if ($_GET['page'] == 'hoteles') {
            include 'hoteles.php';
        } else if ($_GET['page'] == 'cambiarcontrasena') {
            include 'changepass.php';
        } else if ($_GET['page'] == 'clips') {
            include 'clips.php';
        } else if ($_GET['page'] == 'directorios') {
            include 'directorios.php';
          } else if ($_GET['page'] == 'hotelesadmin') {
              include 'hotelesadmin.php';
        } else {
            include 'home.php';
        }
    }
    include 'footer.php';
} else {
    include 'header.php';
    include 'login.php';
}
