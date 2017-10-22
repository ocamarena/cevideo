<title>Video Manager | Iniciar Cesión</title>
<?php
    if (isset($_POST['login'])) {
        include 'config.php';
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $sqlone = $db->prepare("SELECT `username`,`password`,`title`,`code`,`new` FROM `users` WHERE `username`= ?");
        $sqlone->bind_param("s", $username);
        $bindusername = $username;

        $sqlone->execute();
        $sqlone->bind_result($userfromdb, $passfromdb, $titlefromdb, $codefromdb, $newfromdb);
        while ($sqlone->fetch()) {
            $titlefromdb = $titlefromdb;
            $passfromdb = $passfromdb;
            $userfromdb = $userfromdb;
            $codefromdb = $codefromdb;
            $newfromdb = $newfromdb;
        }
        $passverify = password_verify($password, $passfromdb);
        $sqlone->close();
        $thread = $db->thread_id;
        $db->kill($thread);
        if ($passverify) {
            $_SESSION['username'] = $userfromdb;
            $_SESSION['logged'] = true;
            $_SESSION['title'] = $titlefromdb;
            $_SESSION['new'] = $newfromdb;
            if ($titlefromdb == "Gerente") {
                $_SESSION['code'] = $codefromdb;
            }
            if ($titlefromdb == "Desarrollador") {
                $_SESSION['titledev'] = "Corporativo";
                $_SESSION['code'] = $codefromdb;
            } ?><meta http-equiv="refresh" content="0"><?php
        } else {
            echo '<script>Alert.render("El nombre de usuario o la contraseña son incorrectas", "");</script>';
        }
    }

    ?>

	<div class="loginpage">
<center><form class="login" action="" method="post">
	<center><div class="loginimg"><a href="https://www.cityexpress.com"><img src="images/logo-1.png"></a></div></center>
	<div class="loginprompt"><span class="icon-l"><input maxlenght="16" type="text" name="username" placeholder="Nombre de Usuario" required/></span></div><br>
	<div class="loginprompt"><span class="icon-l"><input maxlenght="32" type="password" name="password" placeholder="Contraseña" required/></span></div><br>
	<input type="submit" name="login" value="Iniciar Cesión" /><br>
	<!--<a href="index.php?page=signup" class="signupbtn">Sign up</a>-->
</form></center></div>

</body>
</html>
