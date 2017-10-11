<?php
if ($_SESSION['title'] == "Coorporativo" or $_SESSION['titledev'] == "Coorporativo") {
    ?>
<title>Video Manager | Hoteles</title><?php
    if (isset($_GET['hotel'])) {
        include 'config.php';
        $hotel = $_GET['hotel'];
        $geth = "SELECT * FROM hoteles WHERE code='$hotel'";
        $resultgeth = mysqli_query($db, $geth);
        if (mysqli_num_rows($resultgeth) == 1) {
            //if (file_exists('videos/' . $_GET['hotel'])) { ?><center><div class="title"><a>Hotel <?php echo strtoupper($_GET['hotel']); ?></a></div></center>
    <div class="videoinhotel"><?php
if (file_exists("videos/" . $_GET['hotel'] . "/video.mp4")) {
                ?>
<center><video width="50%" height="auto" loop controls><source src="videos/<?php echo $_GET['hotel']; ?>/video.mp4"></video></center>
<?php
            } else {
                ?>
	<center><div class="fallbackvideo"><div class="fallbackvideoa"><a>No existe video</a></div><div class="fallbackvideoa"><a>para este hotel</a></div></div></center>
	<?php
            } ?>
</div>
  <center><div class="title"><a>Clips</a></div></center>
   <div class="smallvideos"><div class="smallvideoc">
<?php
    if (isset($_POST['deletevideo'])) {
        $nameofvideo = $_POST['video'];
        $code1 = $_POST['code'];
        unlink("videos/$code1/$nameofvideo"); ?><script>Alert.render('Se ha eliminado <?php echo $nameofvideo; ?> permanentemente.', '');</script><?php
    }
            $hotelc = substr($hotel, 0, 2);
            if ($hotelc == "ce") {
                $hotelname = "City Express Hoteles";
            } elseif ($hotelc == "cs") {
                $hotelname = "City Express Suites";
            } elseif ($hotelc == "cj") {
                $hotelname = "City Express Junior";
            } elseif ($hotelc == "cp") {
                $hotelname = "City Express Plus";
            } elseif ($hotelc == "cc") {
                $hotelname = "City Express Plus";
            }
            $noffiles2 = count(glob("videos/$hotel/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE)) + count(glob("videos/$hotelc/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE)) + count(glob("videos/universal/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE));
            $noffiles = count(glob("videos/$hotel/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE));
            $nofcoorp = count(glob("videos/$hotel/coorporativo/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE));
            $nofhotel = count(glob("videos/$hotelc/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE));
            $nuni = count(glob("videos/universal/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE));
            if ($noffiles2 >= 1) {
                ?><div class="subtitle"><a>Clips de <?php echo strtoupper($_GET['hotel']); ?></a></div><?php
        if ($noffiles >= 1) {
            foreach (glob("videos/$hotel/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE) as $filename) {
                $nameoffile = basename($filename);
                if ($nameoffile!='video.mp4') {
                    //$code = $_SESSION['code'];
                    echo "<div class='smallvideo2'>
		<video height='120px' width='215px' controls><source src='$filename'></video>
		<div class='videotitle2'><a>$nameoffile</a></div>
		<a href='' title='Eliminar $nameoffile'><form action='' method='post'><input type='hidden' name='video' value='$nameoffile'><input type='hidden' name='code' value='$hotel'><input name='deletevideo' type='submit' class='icon-remove' value='&#59650'></form></a>
		</div><br>";
                }
            }
        } else {
            ?><center><div class="title"><a>No existen clips para este hotel</a></div></center><?php
        } ?><div class="subtitle"><a>Clips para <?php echo strtoupper($_GET['hotel']); ?> de Coorporativo</a></div><?php
        if ($nofcoorp >= 1) {
            foreach (glob("videos/$hotel/coorporativo/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE) as $filename) {
                $nameoffile = basename($filename);
                if ($nameoffile!='video.mp4') {
                    //$code = $_SESSION['code'];
                    echo "<div class='smallvideo2'>
		<video height='120px' width='215px' controls><source src='$filename'></video>
		<div class='videotitle2'><a>$nameoffile</a></div>
		<a href='' title='Eliminar $nameoffile'><form action='' method='post'><input type='hidden' name='video' value='$nameoffile'><input type='hidden' name='code' value='$hotel/coorporativo'><input name='deletevideo' type='submit' class='icon-remove' value='&#59650'></form></a>
		</div><br>";
                }
            }
        } else {
            ?><center><div class="title"><a>No existen clips para <?php echo strtoupper($_GET['hotel']); ?> de Coorporativo</a></div></center><?php
        } ?><div class="subtitle"><a>Clips de <?php echo $hotelname; ?></a></div><?php
        if ($nofhotel >= 1) {
            foreach (glob("videos/$hotelc/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE) as $filename) {
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
            ?><center><div class="title"><a>No existen clips para <?php echo $hotelname; ?></a></div></center><?php
        } ?><div class="subtitle"><a>Clips Universales</a></div><?php
        if ($nuni >= 1) {
            foreach (glob("videos/universal/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE) as $filename) {
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
        } else {
            ?><center><div class="title"><a>El hotel '<?php echo $_GET['hotel']; ?>' no existe</a></div></center><?php
        }
    } else {
        ?><center><div class="title"><a>Hoteles</a></div></center>
<div class="subtitle"><a>Hoteles City Express</a></div>
<div class='hotellist'>
<?php
        include 'config.php';
        $gethce = "SELECT * FROM hoteles ORDER BY code ASC";
        $resultgethce = mysqli_query($db, $gethce);
        while ($rowgethce = mysqli_fetch_assoc($resultgethce)) {
            $hotelce = substr($rowgethce['code'], 0, 2);
            if ($hotelce == "ce") {
                if ($rowgethce['code'] == "ce000") {
                    if ($_SESSION['title'] == "Desarrollador") {
                        echo "<a href='index.php?page=hoteles&hotel=" . $rowgethce['code'] . "'>" . strtoupper($rowgethce['code']) . "</a>";
                    }
                } else {
                    echo "<a href='index.php?page=hoteles&hotel=" . $rowgethce['code'] . "'>" . strtoupper($rowgethce['code']) . "</a>";
                }
            }
        } ?>
</div>

<div class="subtitle"><a>City Express Suites</a></div>
<div class='hotellist'>
<?php
        include 'config.php';
        $gethcs = "SELECT * FROM hoteles ORDER BY code ASC";
        $resultgethcs = mysqli_query($db, $gethcs);
        while ($rowgethcs = mysqli_fetch_assoc($resultgethcs)) {
            $hotelcs = substr($rowgethcs['code'], 0, 2);
            if ($hotelcs == "cs") {
                echo "<a href='index.php?page=hoteles&hotel=" . $rowgethcs['code'] . "'>" . strtoupper($rowgethcs['code']) . "</a>";
            }
        } ?>
</div>

<div class="subtitle"><a>City Express Junior</a></div>
<div class='hotellist'>
<?php
        include 'config.php';
        $gethcj = "SELECT * FROM hoteles ORDER BY code ASC";
        $resultgethcj = mysqli_query($db, $gethcj);
        while ($rowgethcj = mysqli_fetch_assoc($resultgethcj)) {
            $hotelcj = substr($rowgethcj['code'], 0, 2);
            if ($hotelcj == "cj") {
                echo "<a href='index.php?page=hoteles&hotel=" . $rowgethcj['code'] . "'>" . strtoupper($rowgethcj['code']) . "</a>";
            }
        } ?>
</div>

<div class="subtitle"><a>City Express Plus</a></div>
<div class='hotellist'>
<?php
        include 'config.php';
        $gethcp = "SELECT * FROM hoteles ORDER BY code ASC";
        $resultgethcp = mysqli_query($db, $gethcp);
        while ($rowgethcp = mysqli_fetch_assoc($resultgethcp)) {
            $hotelcp = substr($rowgethcp['code'], 0, 2);
            if ($hotelcp == "cp") {
                echo "<a href='index.php?page=hoteles&hotel=" . $rowgethcp['code'] . "'>" . strtoupper($rowgethcp['code']) . "</a>";
            }
        } ?>
</div>

<div class="subtitle"><a>City Centro</a></div>
<div class='hotellist'>
<?php
        include 'config.php';
        $gethcc = "SELECT * FROM hoteles ORDER BY code ASC";
        $resultgethcc = mysqli_query($db, $gethcc);
        while ($rowgethcc = mysqli_fetch_assoc($resultgethcc)) {
            $hotelcc = substr($rowgethcc['code'], 0, 2);
            if ($hotelcc == "cc") {
                echo "<a href='index.php?page=hoteles&hotel=" . $rowgethcc['code'] . "'>" . strtoupper($rowgethcc['code']) . "</a>";
            }
        } ?>
</div>
<?php
    }
} else {
    echo '<script type="text/javascript">
          window.location = "http://54.183.167.135/cevideo/index.php"
      </script>';
}
?>
