<div class="navbar">
<ul>
<div class="imgnav"><li><a href="index.php?page=home"><img src="images/favicon.png"></a></li></div>
	<li><a href="index.php?page=home"><span class="icon-home"></span> Inicio</a></li>
	<?php
    if ($_SESSION['title'] == "Gerente" or $_SESSION['titledev'] == "Gerente") {
        ?><li><a href="index.php?page=mihotel"><span class="icon-hotel"></span> Mi Hotel</a></li><?php
    }
    if ($_SESSION['title'] == "Administrador" or $_SESSION['titledev'] == "Administrador") {
        ?><li><a href="index.php?page=usuarios"><span class="icon-users"></span> Usuarios</a></li><?php
				?><li><a href="index.php?page=hotelesadmin"><span class="icon-hotel"></span> Hoteles</a></li><?php
    }
    if ($_SESSION['title'] == "Corporativo" || $_SESSION['titledev'] == "Corporativo") {
        ?><li><a href="index.php?page=hoteles"><span class="icon-hotel"></span> Hoteles</a></li><?php
        ?><li><a href="index.php?page=clips"><span class="icon-video"></span> Agregar Clips</a></li><?php
        ?><li><a href="index.php?page=directorios"><span class="icon-folder"></span> Directorios</a></li><?php
    }
    ?>
	<div class="titlenav"><li>
	<?php
        if (isset($_POST['changetitle']) && $_POST["changetitle"] == "submit") {
            $title = $_POST['title'];
            unset($_SESSION['titledev']);
            $_SESSION['titledev'] = $title; ?><meta http-equiv="refresh" content="0"><?php
            //echo "<script>Alert.render('$title', '')</script>";
        }
        if ($_SESSION['title'] == "Gerente") {
            echo "<div class='gerente'><a>" . $_SESSION['title'] . " (" . $_SESSION['code'] . ")";
        } elseif ($_SESSION['title'] == "Corporativo") {
            echo "<div class='corporativo'><a>" . $_SESSION['title'];
        } elseif ($_SESSION['title'] == "Administrador") {
            echo "<div class='administrador'><a>" . $_SESSION['title'];
        } elseif ($_SESSION['title'] == "Desarrollador") {
            echo "<div class='desarrollador'><a>" . $_SESSION['title'] . " <form class='devselect' action='' method='post'><select name='title' class='" . strtolower($_SESSION['titledev']) . "2' onchange='this.form.submit()'>";
            if ($_SESSION['titledev'] == "Gerente") {
                echo "<div class='gerente'><option value='Gerente' selected>Gerente (CE000)</option></div>";
            } else {
                echo "<option value='Gerente'>Gerente (CE000)</option>";
            }
            if ($_SESSION['titledev'] == "Corporativo") {
                echo "<div class='corporativo2'><option value='Corporativo' selected>Corporativo</option></div>";
            } else {
                echo "<option value='Corporativo'>Corporativo</option>";
            }
            if ($_SESSION['titledev'] == "Administrador") {
                echo "<div class='administrador'><option value='Administrador' selected>Administrador</option></div>";
            } else {
                echo    "<option value='Administrador'>Administrador</option>";
            }
            echo "</select><input type='hidden' name='changetitle' value='submit'></form>";
        }
        ?>

		</a></div></li></div>
<div class="usernav"><li><a href="index.php?page=account"><span class="icon-user"></span>
<?php echo $_SESSION['username']; ?></a></li></div>
</ul>
</div>
<div class="pagecontainer">
