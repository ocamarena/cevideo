<?php
if ($_SESSION['title'] == "Coorporativo" or $_SESSION['titledev'] == "Coorporativo") {
    if (isset($_POST['deletevideo'])) {
        $nameofvideo = $_POST['video'];
        $code1 = $_POST['code'];
        unlink("videos/$code1/$nameofvideo"); ?><script>Alert.render('Se ha eliminado <?php echo $nameofvideo; ?> permanentemente.', '');</script><?php
    } ?>
<title>Video Manager | Directorios</title>
<center><div class="title"><a>Directorios</a></div></center>
<div class="subtitle"><a>Clips Universales</a></div>
<?php
    $nuni = count(glob("videos/universal/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE));
    if ($nuni >= 1) {
        foreach (glob("videos/universal/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE) as $filename) {
            $nameoffile = basename($filename);
            if ($nameoffile!='video.mp4') {
                //$code = $_SESSION['code'];
                echo "<div class='smallvideo2'>
		<video height='120px' width='215px' controls><source src='$filename'></video>
		<div class='videotitle2'><a>$nameoffile</a></div>
		<a href='' title='Eliminar $nameoffile'><form action='' method='post'><input type='hidden' name='video' value='$nameoffile'><input type='hidden' name='code' value='universal'><input name='deletevideo' type='submit' class='icon-remove' value='&#59650'></form></a>
		</div><br>";
            }
        }
    } else {
        ?><center><div class="title"><a>No existen clips Universales</a></div></center><?php
    } ?>
<div class="subtitle"><a>Clips de Hoteles City Express</a></div>
<?php
    $nofce = count(glob("videos/ce/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE));
    if ($nofce >= 1) {
        foreach (glob("videos/ce/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE) as $filename) {
            $nameoffile = basename($filename);
            if ($nameoffile!='video.mp4') {
                //$code = $_SESSION['code'];
                echo "<div class='smallvideo2'>
		<video height='120px' width='215px' controls><source src='$filename'></video>
		<div class='videotitle2'><a>$nameoffile</a></div>
		<a href='' title='Eliminar $nameoffile'><form action='' method='post'><input type='hidden' name='video' value='$nameoffile'><input type='hidden' name='code' value='ce'><input name='deletevideo' type='submit' class='icon-remove' value='&#59650'></form></a>
		</div><br>";
            }
        }
    } else {
        ?><center><div class="title"><a>No existen clips para Hoteles City Express</a></div></center><?php
    } ?>
<div class="subtitle"><a>Clips de City Express Suites</a></div>
<?php
    $nofcs = count(glob("videos/cs/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE));
    if ($nofcs >= 1) {
        foreach (glob("videos/cs/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE) as $filename) {
            $nameoffile = basename($filename);
            if ($nameoffile!='video.mp4') {
                //$code = $_SESSION['code'];
                echo "<div class='smallvideo2'>
		<video height='120px' width='215px' controls><source src='$filename'></video>
		<div class='videotitle2'><a>$nameoffile</a></div>
		<a href='' title='Eliminar $nameoffile'><form action='' method='post'><input type='hidden' name='video' value='$nameoffile'><input type='hidden' name='code' value='cs'><input name='deletevideo' type='submit' class='icon-remove' value='&#59650'></form></a>
		</div><br>";
            }
        }
    } else {
        ?><center><div class="title"><a>No existen clips para City Express Suites</a></div></center><?php
    } ?>
<div class="subtitle"><a>Clips de City Express Junior</a></div>
<?php
    $nofcj = count(glob("videos/cj/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE));
    if ($nofcj >= 1) {
        foreach (glob("videos/cj/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE) as $filename) {
            $nameoffile = basename($filename);
            if ($nameoffile!='video.mp4') {
                //$code = $_SESSION['code'];
                echo "<div class='smallvideo2'>
		<video height='120px' width='215px' controls><source src='$filename'></video>
		<div class='videotitle2'><a>$nameoffile</a></div>
		<a href='' title='Eliminar $nameoffile'><form action='' method='post'><input type='hidden' name='video' value='$nameoffile'><input type='hidden' name='code' value='cj'><input name='deletevideo' type='submit' class='icon-remove' value='&#59650'></form></a>
		</div><br>";
            }
        }
    } else {
        ?><center><div class="title"><a>No existen clips para City Express Junior</a></div></center><?php
    } ?>
<div class="subtitle"><a>Clips de City Express Plus</a></div>
<?php
    $nofcp = count(glob("videos/cp/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE));
    if ($nofcp >= 1) {
        foreach (glob("videos/cp/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE) as $filename) {
            $nameoffile = basename($filename);
            if ($nameoffile!='video.mp4') {
                //$code = $_SESSION['code'];
                echo "<div class='smallvideo2'>
		<video height='120px' width='215px' controls><source src='$filename'></video>
		<div class='videotitle2'><a>$nameoffile</a></div>
		<a href='' title='Eliminar $nameoffile'><form action='' method='post'><input type='hidden' name='video' value='$nameoffile'><input type='hidden' name='code' value='cp'><input name='deletevideo' type='submit' class='icon-remove' value='&#59650'></form></a>
		</div><br>";
            }
        }
    } else {
        ?><center><div class="title"><a>No existen clips para City Express Plus</a></div></center><?php
    } ?>
<div class="subtitle"><a>Clips de City Centro</a></div>
<?php
    $nofcc = count(glob("videos/cc/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE));
    if ($nofcc >= 1) {
        foreach (glob("videos/cc/{*.mp4,*.flv,*.mov,*.m4v,*.mpg}", GLOB_BRACE) as $filename) {
            $nameoffile = basename($filename);
            if ($nameoffile!='video.mp4') {
                //$code = $_SESSION['code'];
                echo "<div class='smallvideo2'>
		<video height='120px' width='215px' controls><source src='$filename'></video>
		<div class='videotitle2'><a>$nameoffile</a></div>
		<a href='' title='Eliminar $nameoffile'><form action='' method='post'><input type='hidden' name='video' value='$nameoffile'><input type='hidden' name='code' value='cc'><input name='deletevideo' type='submit' class='icon-remove' value='&#59650'></form></a>
		</div><br>";
            }
        }
    } else {
        ?><center><div class="title"><a>No existen clips para City Centro</a></div></center><?php
    } ?>
<?php
} else {
        echo '<script type="text/javascript">
          window.location = "https://frank.fabregat.com.mx/cevideo/index.php"
      </script>';
    }
?>
