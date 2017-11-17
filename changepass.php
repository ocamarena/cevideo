<title>Video Manager | Cambiar Contraseña</title>
<center><div class="title"><a>Cambiar Contraseña</a></div></center>
<?php
if (isset($_POST['createnewpass'])) {
    include 'config.php';
    $password1 = mysqli_real_escape_string($db, $_POST['pass1']);
    $password2 = mysqli_real_escape_string($db, $_POST['pass2']);
    $password3 = mysqli_real_escape_string($db, $_POST['pass3']);
    if ($password2 == $password3) {
        if (preg_match('~[A-Z]~', $password2) &&
    preg_match('~[a-z]~', $password2) &&
    preg_match('~\d~', $password2) &&
    (strlen($password2) > 7)) {
            $sessionuser = $_SESSION['username'];
            $sqltwo = $db->prepare("SELECT `password` FROM `users` WHERE `username`= ?");
            $sqltwo->bind_param("s", $bindusername);
            $bindusername = $sessionuser;

            $sqltwo->execute();
            $sqltwo->bind_result($passfromdb);
            while ($sqltwo->fetch()) {
                $passfromdb = $passfromdb;
            }
            $passverify = password_verify($password1, $passfromdb);
            $sqltwo->close();
            $thread = $db->thread_id;
            $db->kill($thread);
            if ($passverify) {
                include 'config.php';
                $hashpass = password_hash($password2, PASSWORD_DEFAULT);
                $sqlsetnewpass = "UPDATE users SET password='$hashpass' WHERE username='$sessionuser'";
                $resultsetnewpass = mysqli_query($db, $sqlsetnewpass);
                if ($resultsetnewpass) {
                    if ($_SESSION['new'] == "yes") {
                        unset($_SESSION['new']);
                        $_SESSION['new'] == "no";
                        include 'config.php';
                        $sqlnew = "UPDATE users SET new='no' WHERE username='$sessionuser'";
                        $resultnew = mysqli_query($db, $sqlnew);
                    }
                    echo "<script>Alert.render('Su contraseña ha sido cambiada.', 'index.php?page=home')</script>";
                } else {
                    echo "<script>Alert.render('Ha habido un error al cambiar su contraseña. Intente otra vez.', '')</script>";
                }
            } else {
                echo "<script>Alert.render('La contraseña actual es incorrecta. Intente otra vez.', '')</script>";
            }
        } else {
            echo "<script>Alert.render('Las contraseñas deben tener por lo menos 8 caracteres, un numero, una letra mayuscula y una letra minuscula.', '')</script>";
        }
    } else {
        echo "<script>Alert.render('Las contraseñas nuevas no coinciden.', '')</script>";
    }
}
    ?>
<center><form action="" method="post">
	<div class="changepassform">
	<input type="password" placeholder="Contraseña Actual" maxlength="32" name="pass1" required /><br>
		<input type="password" placeholder="Contraseña Nueva" maxlength="32" name="pass2" required /><br>
		<input type="password" placeholder="Repetir Contraseña Nueva" maxlength="32" name="pass3" required /><br>
		<input type="submit" name="createnewpass" value="Cambiar Contraseña">
	</div>
	</form></center>
	<?php

?>
