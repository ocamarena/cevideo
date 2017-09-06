<?php
if ($_SESSION['title'] == "Coorporativo" or $_SESSION['titledev'] == "Coorporativo") {
?>
<title>Video Manager | Agregar Clips</title><?php
?>
<center><div class="title"><a>Agregar Clips</a></div></center>
<?php
if (isset($_POST['uploadvideo'])) {
	$array = $_POST['destination'];
	$nofdest = count($array);
	/*echo "<script>Alert.render('Se ha subido el video a')</script>";
	foreach ($array as $dest) {
		echo $dest.", ";
	}
	echo $array[0];
	echo $array;*/


	$name = $_FILES ['file'] ['name'];
			$tmp_name = $_FILES ['file'] ['tmp_name'];
			$num = count($_FILES['file']['name']);
			//$location = "videos/$code/";
			$getext = explode('.' , $name);
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
		if ($nofdest == 1) {
			if ($array[0] == "universal") {
				$path = "videos/universal";
				$destname = "Universal";
			} else {
			if ($array[0] == "ce") {
				$path = "videos/ce";
				$destname = "Hoteles City Express";
			} else if ($array[0] == "cs") {
			$path = "videos/cs";
				$destname = "City Express Suites";
		} else if ($array[0] == "cj") {
			$path = "videos/cj";
				$destname = "City Express Junior";
		} else if ($array[0] == "cp") {
			$path = "videos/cp";
				$destname = "City Express Plus";
		} else if ($array[0] == "cc") {
			$path = "videos/cc";
				$destname = "City Centro";
		} else {
				$path = "/videos/$array[0]/coorporativo";
				$destname = strtoupper($array[0]);
				if (!file_exists($path)) {
						mkdir($path, 0755, true);
			}
			}}
			if (file_exists("$path/$name") or $name == "video.mp4") {
				?><script>Alert.render("El video '<?php echo $name; ?>' ya existe. Por favor cambie el nombre de el video.", "");</script><?php
			} else {
				if (move_uploaded_file($tmp_name, "$path/$name")) {
				echo "<script>Alert.render('Se ha subido el clip a \'$destname\'', '');</script>";
			} else {
				?><script>Alert.render('No se pudo subir el clip en el momento. Por favor intenta despues.', '');</script><?php
				if (is_writable($path)) {
						echo "writable";
					} else {
						echo "not writable";
					}
					if (file_exists($path)) {
						echo "exists";
					} else {
						echo "does not exist";
					}
			}}
		} else {
			if (in_array("universal", $array)) {
				if (file_exists("videos/universal/$name") or $name == "video.mp4") {
				?><script>Alert.render("El video '<?php echo $name; ?>' ya existe. Por favor cambie el nombre de el video.", "");</script><?php
			} else {
				if (move_uploaded_file($tmp_name, "videos/universal/$name")) {
				echo "<script>Alert.render('Se ha subido el clip a \'Universal\'', '');</script>";
			} else {
				?><script>Alert.render('No se pudo subir el clip en el momento. Por favor intenta despues.', '');</script><?php
			}}
			} else {
			?><script>Alert.render('Hay 2 o mas destinos.', '');</script><?php
				if (in_array("ce", $array)) {
					$isce = "yes";
				}
				if (in_array("cs", $array)) {
					$iscs = "yes";
				}
				if (in_array("cj", $array)) {
					$iscj = "yes";
				}
				if (in_array("cp", $array)) {
					$iscp = "yes";
				}
				if (in_array("cc", $array)) {
					$iscc = "yes";
				}
			if ($array[0] == "ce") {
				$path = "videos/ce";
				$destname = "Hoteles City Express";
			} else if ($array[0] == "cs") {
			$path = "videos/cs";
				$destname = "City Express Suites";
		} else if ($array[0] == "cj") {
			$path = "videos/cj";
				$destname = "City Express Junior";
		} else if ($array[0] == "cp") {
			$path = "videos/cp";
				$destname = "City Express Plus";
		} else if ($array[0] == "cc") {
			$path = "videos/cc";
				$destname = "City Centro";
		} else {
				$path = "videos/$array[0]/coorporativo";
				$destname = strtoupper($array[0]);
				if (!file_exists($path)) {
						mkdir($path, 0777, true);
			}}
				$errors = array();
				if (file_exists("$path/$name") or $name == "video.mp4") {
				array_push($errors, $destname);
			} else {
				if (move_uploaded_file($tmp_name, "$path/$name")) {
				//echo "<script>Alert.render('Se ha subido el clip a \'$destname\'', '');</script>";
			} else {
				array_push($errors, $destname);
			}}
				$firstdir = $array[0];
				foreach ($array as $dest) {
					if ($dest == "ce") {
				$pathn = "videos/ce";
				$destnamen = "Hoteles City Express";
			} else if ($dest == "cs") {
			$pathn = "videos/cs";
				$destnamen = "City Express Suites";
		} else if ($dest == "cj") {
			$pathn = "videos/cj";
				$destnamen = "City Express Junior";
		} else if ($dest == "cp") {
			$pathn = "videos/cp";
				$destnamen = "City Express Plus";
		} else if ($dest == "cc") {
			$pathn = "videos/cc";
				$destnamen = "City Centro";
		} else {
				$pathn = "videos/$dest/coorporativo";
				$destnamen = strtoupper($dest);
				if (!file_exists($pathn)) {
						mkdir($pathn, 0777, true);
			}}
		if ($dest == $firstdir) {} else {
			if (substr($dest, 0, 2) == "ce") {
				if ($dest == "ce") {
					if (file_exists("$pathn/$name") or $name == "video.mp4") {
						array_push($errors, $destnamen);
					} else {
					copy("$path/$name", "$pathn/$name");
					}
				} else {
					if ($isce == "yes") {} else {
						if (file_exists("$pathn/$name") or $name == "video.mp4") {
						array_push($errors, $destnamen);
					} else {
					copy("$path/$name", "$pathn/$name");
					}
					}
				}
			} else if (substr($dest, 0, 2) == "cs") {
				if ($dest == "cs") {
					if (file_exists("$pathn/$name") or $name == "video.mp4") {
						array_push($errors, $destnamen);
					} else {
					copy("$path/$name", "$pathn/$name");
					}
				} else {
					if ($iscs == "yes") {} else {
						if (file_exists("$pathn/$name") or $name == "video.mp4") {
						array_push($errors, $destnamen);
					} else {
					copy("$path/$name", "$pathn/$name");
					}
					}
				}
			} else if (substr($dest, 0, 2) == "cj") {
				if ($dest == "cj") {
					if (file_exists("$pathn/$name") or $name == "video.mp4") {
						array_push($errors, $destnamen);
					} else {
					copy("$path/$name", "$pathn/$name");
					}
				} else {
					if ($iscj == "yes") {} else {
						if (file_exists("$pathn/$name") or $name == "video.mp4") {
						array_push($errors, $destnamen);
					} else {
					copy("$path/$name", "$pathn/$name");
					}
					}
				}
			} else if (substr($dest, 0, 2) == "cp") {
				if ($dest == "cp") {
					if (file_exists("$pathn/$name") or $name == "video.mp4") {
						array_push($errors, $destnamen);
					} else {
					copy("$path/$name", "$pathn/$name");
					}
				} else {
					if ($iscp == "yes") {} else {
						if (file_exists("$pathn/$name") or $name == "video.mp4") {
						array_push($errors, $destnamen);
					} else {
					copy("$path/$name", "$pathn/$name");
					}
					}
				}
			} else if (substr($dest, 0, 2) == "cc") {
				if ($dest == "cc") {
					if (file_exists("$pathn/$name") or $name == "video.mp4") {
						array_push($errors, $destnamen);
					} else {
					copy("$path/$name", "$pathn/$name");
					}
				} else {
					if ($iscc == "yes") {} else {
						if (file_exists("$pathn/$name") or $name == "video.mp4") {
						array_push($errors, $destnamen);
					} else {
					copy("$path/$name", "$pathn/$name");
					}
					}
				}
			}

		}
	}
				?><script>Alert.render('Se ha subido <?php echo $name; ?>.<br><?php if (count($errors) >= 1) {
					echo "<br>Error: No se pudieron subir los clips en los siguientes destinos: <br>";
					$end = end($errors);
					foreach($errors as $error) {
						if (count($errors) >= 2) {
						if ($end != $error) {
						echo $error . ", ";
						} else {
							echo "y " . $error . ".";
						}
						} else {
							echo $error . ".";
						}

					}
					echo "<br><br>El clip ya existe en ese/esos directorio/s. Por favor intente con un nuevo nombre.";
				}
									   ?>', '');</script><?php
			}
		}
	} else {
			?><script>Alert.render('Solo puedes subir un video a la vez.', '');</script><?php
		}
			/*if ($num == 1) {
				if (file_exists("videos/$code/$name") or $name == "video.mp4") {
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
}*/
}

?>
<form class="form" action="" method="post" enctype="multipart/form-data"><center>
<!--<input type="file" accept="video/mp4" name="file" id="file" class="inputfile" data-multiple-caption="{count} videos seleccionados" multiple />-->
				<input type="file" accept="video/mp4,video/x-m4v,video/flv,video/mov,video/mpg" name="file" id="file" class="inputfile" data-multiple-caption="Solo puedes seleccionar un video" required/>
					<label for="file"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" style="color: white;" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Escoger Clip</span></label><br></center>
					<div class="subtitle"><a>Universal</a></div>
				<div class='hotellist'>
					<input id="universal" type="checkbox" name="destination[]" value="universal"><label for="universal">Universal</label></div>
					<div class="subtitle"><a>Marcas</a></div>
				<div class='hotellist'>
					<input id="ce" type="checkbox" name="destination[]" value="ce"><label for="ce">Hoteles City Express</label>
				<input id="cs" type="checkbox" name="destination[]" value="cs"><label for="cs">City Express Suites</label>
				<input id="cj" type="checkbox" name="destination[]" value="cj"><label for="cj">City Express Junior</label>
				<input id="cp" type="checkbox" name="destination[]" value="cp"><label for="cp">City Express Plus</label>
				<input id="cc" type="checkbox" name="destination[]" value="cc"><label for="cc">City Centro</label>
	</div>
	<div class="subtitle"><a>Hoteles</a></div>
	<center><div class="title"><a>Hoteles City Express</a></div>
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
						echo '<input id="' . $rowgethce['code'] . '" type="checkbox" name="destination[]" value="' . $rowgethce['code'] . '"><label for="' . $rowgethce['code'] . '">' . strtoupper($rowgethce['code']) . '</label>';
					}
				} else {
			echo '<input id="' . $rowgethce['code'] . '" type="checkbox" name="destination[]" value="' . $rowgethce['code'] . '"><label for="' . $rowgethce['code'] . '">' . strtoupper($rowgethce['code']) . '</label>';
				}
			}
		}

?>
</div>
	<div class="title"><a>City Express Suites</a></div>
<div class='hotellist'>
<?php
		include 'config.php';
		$gethcs = "SELECT * FROM hoteles ORDER BY code ASC";
		$resultgethcs = mysqli_query($db, $gethcs);
		while ($rowgethcs = mysqli_fetch_assoc($resultgethcs)) {
			$hotelcs = substr($rowgethcs['code'], 0, 2);
			if ($hotelcs == "cs") {
			//echo "<a href='index.php?page=hoteles&hotel=" . $rowgethcs['code'] . "'>" . strtoupper($rowgethcs['code']) . "</a>";
			echo '<input id="' . $rowgethcs['code'] . '" type="checkbox" name="destination[]" value="' . $rowgethcs['code'] . '"><label for="' . $rowgethcs['code'] . '">' . strtoupper($rowgethcs['code']) . '</label>';
			}
		}

?>
</div>
	<div class="title"><a>City Express Junior</a></div>
<div class='hotellist'>
<?php
		include 'config.php';
		$gethcj = "SELECT * FROM hoteles ORDER BY code ASC";
		$resultgethcj = mysqli_query($db, $gethcj);
		while ($rowgethcj = mysqli_fetch_assoc($resultgethcj)) {
			$hotelcj = substr($rowgethcj['code'], 0, 2);
			if ($hotelcj == "cj") {
			//echo "<a href='index.php?page=hoteles&hotel=" . $rowgethcj['code'] . "'>" . strtoupper($rowgethcj['code']) . "</a>";

			echo '<input id="' . $rowgethcj['code'] . '" type="checkbox" name="destination[]" value="' . $rowgethcj['code'] . '"><label for="' . $rowgethcj['code'] . '">' . strtoupper($rowgethcj['code']) . '</label>';}
		}

?>
</div>

	<div class="title"><a>City Express Plus</a></div>
<div class='hotellist'>
<?php
		include 'config.php';
		$gethcp = "SELECT * FROM hoteles ORDER BY code ASC";
		$resultgethcp = mysqli_query($db, $gethcp);
		while ($rowgethcp = mysqli_fetch_assoc($resultgethcp)) {
			$hotelcp = substr($rowgethcp['code'], 0, 2);
			if ($hotelcp == "cp") {
			//echo "<a href='index.php?page=hoteles&hotel=" . $rowgethcp['code'] . "'>" . strtoupper($rowgethcp['code']) . "</a>";

			echo '<input id="' . $rowgethcp['code'] . '" type="checkbox" name="destination[]" value="' . $rowgethcp['code'] . '"><label for="' . $rowgethcp['code'] . '">' . strtoupper($rowgethcp['code']) . '</label>';}
		}

?>
</div>

	<div class="title"><a>City Centro</a></div>
<div class='hotellist'>
<?php
		include 'config.php';
		$gethcc = "SELECT * FROM hoteles ORDER BY code ASC";
		$resultgethcc = mysqli_query($db, $gethcc);
		while ($rowgethcc = mysqli_fetch_assoc($resultgethcc)) {
			$hotelcc = substr($rowgethcc['code'], 0, 2);
			if ($hotelcc == "cc") {
			//echo "<a href='index.php?page=hoteles&hotel=" . $rowgethcc['code'] . "'>" . strtoupper($rowgethcc['code']) . "</a>";
				echo '<input id="' . $rowgethcc['code'] . '" type="checkbox" name="destination[]" value="' . $rowgethcc['code'] . '"><label for="' . $rowgethcc['code'] . '">' . strtoupper($rowgethcc['code']) . '</label>';
			}
		}

?>
		</div></center>

					<center><input type="submit" name="uploadvideo" value="Subir Clip"></center>
	</form>
<script src="custom-file-input.js"></script>
<?php
} else {
	echo '<script type="text/javascript">
          window.location = "https://frank.fabregat.com.mx/cevideo/index.php"
      </script>';
}
