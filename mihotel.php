<?php
if ($_SESSION['title'] == "Gerente" or $_SESSION['titledev'] == "Gerente") {
    ?>
<title>Video Manager | Mi Hotel</title>
<center><div class="title"><a>Mi Hotel</a></div></center>
<?php
$username = $_SESSION['username'];
    include 'config.php';
    $sqlcode = "SELECT code FROM users WHERE username='$username'";
    $resultcode = mysqli_query($db, $sqlcode);
    $rowcode = mysqli_fetch_assoc($resultcode);
    $code = $rowcode['code']; ?><div class="videoinhotel"><?php
if (file_exists("videos/" . $rowcode['code'] . "/video.mp4")) {
        ?>
<center><video width="50%" height="auto" loop controls><source src="videos/<?php echo $rowcode['code']; ?>/video.mp4"></video></center>
<?php
    } else {
        ?>
	<center><div class="fallbackvideo"><div class="fallbackvideoa"><a>No existe video</a></div><div class="fallbackvideoa"><a>para este hotel</a></div></div></center>
	<?php
    } ?>
</div>
<center><div class="title"><a>Clips</a></div></center>
<?php
//
//
//   STARTS HERE
//
//
?>
<div class="smallvideos"><div class="smallvideoc">
<?php
    if (isset($_POST['deletevideo'])) {
        $nameofvideo = $_POST['video'];
        $code1 = $_POST['code'];
        unlink("videos/$code1/$nameofvideo"); ?><script>Alert.render('Se ha eliminado <?php echo $nameofvideo; ?> permanentemente.', '');</script><?php
    }
    $hotel = substr($_SESSION['code'], 0, 2);
    if ($hotel == "ce") {
        $hotelname = "City Express Hoteles";
    } elseif ($hotel == "cs") {
        $hotelname = "City Express Suites";
    } elseif ($hotel == "cj") {
        $hotelname = "City Express Junior";
    } elseif ($hotel == "cp") {
        $hotelname = "City Express Plus";
    } elseif ($hotel == "cc") {
        $hotelname = "City Express Plus";
    }
    $noffiles2 = count(glob("videos/$code/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE)) + count(glob("videos/$hotel/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE)) + count(glob("videos/universal/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE));
    $noffiles = count(glob("videos/$code/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE));
    $nofhotel = count(glob("videos/$hotel/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE));
    $nofcoorp = count(glob("videos/$code/corporativo/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE));
    $nuni = count(glob("videos/universal/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE));
    if ($noffiles2 >= 1) {
        ?><div class="subtitle"><a>Clips de Mi Hotel</a></div><?php
        if ($noffiles >= 1) {
            foreach (glob("videos/$code/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE) as $filename) {
                $nameoffile = basename($filename);
                if ($nameoffile!='video.mp4') {
                    $code = $_SESSION['code'];
                    echo "<div class='smallvideo2'>
		<video height='120px' width='215px' controls><source src='$filename'></video>
		<div class='videotitle2'><a>$nameoffile</a></div>
		<a href='' title='Eliminar $nameoffile'><form action='' method='post'><input type='hidden' name='video' value='$nameoffile'><input type='hidden' name='code' value='$code'><input name='deletevideo' type='submit' class='icon-remove' value='&#59650'></form></a>
		</div><br>";
                }
            }
        } else {
            ?><center><div class="title"><a>No tienes clips para Tu Hotel</a></div></center><?php
        } ?><div class="subtitle"><a>Clips para Tu Hotel de Corporativo</a></div><?php
        if ($nofcoorp >= 1) {
            foreach (glob("videos/$code/corporativo/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE) as $filename) {
                $nameoffile = basename($filename);
                if ($nameoffile!='video.mp4') {
                    //$code = $_SESSION['code'];
                    echo "<div class='smallvideo2'>
		<video height='120px' width='215px' controls><source src='$filename'></video>
		<div class='videotitle2'><a>$nameoffile</a></div>

		</div><br>";
                }
            }
        } else {
            ?><center><div class="title"><a>No existen clips para Tu Hotel de Corporativo</a></div></center><?php
        } ?><div class="subtitle"><a>Clips de <?php echo $hotelname; ?></a></div><?php
        if ($nofhotel >= 1) {
            foreach (glob("videos/$hotel/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE) as $filename) {
                $nameoffile = basename($filename);
                if ($nameoffile!='video.mp4') {
                    $code = $_SESSION['code'];
                    echo "<div class='smallvideo2'>
		<video height='120px' width='215px' controls><source src='$filename'></video>
		<div class='videotitle2'><a>$nameoffile</a></div>

		</div><br>";
                }
            }
        } else {
            ?><center><div class="title"><a>No existen clips para <?php echo $hotelname; ?></a></div></center><?php
        } ?><div class="subtitle"><a>Clips Universales</a></div><?php
        if ($nuni >= 1) {
            foreach (glob("videos/universal/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE) as $filename) {
                $nameoffile = basename($filename);
                if ($nameoffile!='video.mp4') {
                    $code = $_SESSION['code'];
                    echo "<div class='smallvideo2'>
		<video height='120px' width='215px' controls><source src='$filename'></video>
		<div class='videotitle2'><a>$nameoffile</a></div>

		</div><br>";
                }
            }
        } else {
            ?><center><div class="title"><a>No existen clips universales</a></div></center><?php
        }
    } else {
        ?><center><div class="fallbackvideo"><div class="fallbackvideoa"><a>No existen clips</a></div><div class="fallbackvideoa"><a>para este hotel</a></div></div></center><?php
    }

    if (isset($_POST['genvideo'])) {
        ?><script>Alert.render('Se ha generado el video.', '');</script><?php
    } ?></div><?php
    if ($noffiles2 >= 1) {
        ?>
	<center><form class="genvideobtn" action="" method="post">
	<input type="hidden" value="<?php echo $code; ?>">
		<input type="submit" name="genvideo" value="Generar Video">
		</form></center>
	<?php
    } ?>
	</div>
<?php
//
//
//    ENDS HERE
//
//
?>
<center><div class="title"><a>Subir Un Clip Nuevo</a></div></center>

<?php
if (isset($_POST['uploadvideo'])) {
    $name = $_FILES ['file'] ['name'];
    $tmp_name = $_FILES ['file'] ['tmp_name'];
    $num = count($_FILES['file']['name']);
    $location = "videos/$code/";
    $getext = explode('.', $name);
    $filename = $getext[0];
    $extension = $getext[1];
    //$username = $_SESSION['username'];
    //include 'config.php';
    //$sqlcode = "SELECT code FROM users WHERE username='$username'";
    //$resultcode = mysqli_query($db, $sqlcode);
    //$rowcode = mysqli_fetch_assoc($resultcode);
    //$newname = $_SESSION['code'] . ".mp4";
    //$newname = "asd.mp4";
    if ($num == 1) {
        if (file_exists("videos/code/$name") or $name == "video.mp4") {
            ?><script>Alert.render("El video '<?php echo $name; ?>' ya existe. Por favor cambie el nombre de el video.", "");</script><?php
        } else {
            if (move_uploaded_file($tmp_name, $location.$name)) {
                ?><script>Alert.render("Se ha subido '<?php echo $name; ?>'.", "");</script><?php
            } else {
                ?><script>Alert.render('No se pudo subir el video en el momento. Por favor intenta despues.', '');</script><?php
            }
        }
    } else {
        ?><script>Alert.render('Solo puedes subir un video a la vez.', '');</script><?php
    }
} ?>
<center><form class="form" action="" method="post" enctype="multipart/form-data">
<!--<input type="file" accept="video/mp4" name="file" id="file" class="inputfile" data-multiple-caption="{count} videos seleccionados" multiple />-->
				<input type="file" accept="video/mp4,video/x-m4v,video/flv,video/mov,video/mpg" name="file" id="file" class="inputfile" data-multiple-caption="Solo puedes seleccionar un video" required/>
					<label for="file"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" style="color: white;" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Escoger Clip</span></label><br>
					<input type="submit" name="uploadvideo" value="Subir Clip">
	</form></center>
<script src="custom-file-input.js"></script>
<?php
} else {
    echo '<script type="text/javascript">
          window.location = "index.php"
      </script>';
}
    ?>
