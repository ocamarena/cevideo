<?php
if ($_SESSION['title'] == "Administrador" or $_SESSION['titledev'] == "Administrador") {
    ?>
<title>Video Manager | Usuarios</title>
<?php
    if (isset($_GET['deleteuser'])) {
        include 'config.php';
        $id = mysqli_real_escape_string($db, $_GET['deleteuser']);
        $sqlone = $db->prepare("SELECT `username` FROM `users` WHERE `id`= ?");
        $sqlone->bind_param("i", $bindid);
        $bindid = $id;

        $sqlone->execute();
        $sqlone->bind_result($userfromdb);
        while ($sqlone->fetch()) {
            $userfromdb = $userfromdb;
        }
        $sqlone->close();
        $thread = $db->thread_id;
        $db->kill($thread);
        if ($userfromdb != null and $userfromdb != $_SESSION['username']) {
            ?><div id="dialogoverlay2"></div>
<center><div id="dialogbox2">
  <div>
     <form action="index.php?page=usuarios" method="post"><div id='dialogboxhead2'><img src='images/favicon.png'></img></div>
				<div id='dialogboxbody2'>La cuenta '<?php echo $userfromdb; ?>' se eliminara permanentemente y la cuenta no va a poderse recuperar. Ingrese su contraseña para continuar.
                <br><center><input type="password" maxlength="36" name="prompt" placeholder="Contraseña" required /><input type="hidden" value="<?php echo $_GET['deleteuser']; ?>" name="id"></center></div>
	  <div id='dialogboxfoot2'><div class='alertcancelbtn'><a href="index.php?page=usuarios">Cancelar</a></div><div class='alertokbtn'><input type="submit" name="deleteuserprompt" value="Continuar"></div></div></form>
    </div>
	</div></center><?php
        }
    }
    if (isset($_POST['deleteuserprompt'])) {
        include 'config.php';
        $id = mysqli_real_escape_string($db, $_POST['id']);
        $password1 = mysqli_real_escape_string($db, $_POST['prompt']);
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
        include 'config.php';
        $sqlone = $db->prepare("SELECT `username` FROM `users` WHERE `id`= ?");
        $sqlone->bind_param("i", $bindid);
        $bindid = $id;

        $sqlone->execute();
        $sqlone->bind_result($userfromdb);
        while ($sqlone->fetch()) {
            $userfromdb = $userfromdb;
        }
        $sqlone->close();
        $thread = $db->thread_id;
        $db->kill($thread);
        if ($passverify) {
            include 'config.php';
            $sqldelete = "DELETE FROM users WHERE id='$id' AND username='$userfromdb'";
            $resultdelete = mysqli_query($db, $sqldelete);
            echo "<script>Alert.render('La cuenta $userfromdb ha sido eliminada permanentemente.', '')</script>";
        } else {
            echo "<script>Alert.render('La contraseña es incorrecta. Intente otra vez.', '')</script>";
        }
    } ?>
<center><div class="title"><a>Usuarios</a></div></center><?php
?><div class="title"><a>Agregar Usuario</a></div>
<?php
    if (isset($_POST['adduser'])) {
        function generateRandomString($length)
        {
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        function generatePassword($length)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        $random = generateRandomString("5");
        $random2 = generateRandomString("5");
        include 'config.php';
        $firstattempt = substr(strtolower(mysqli_real_escape_string($db, $_POST['firstname'])), 0, 1) . strtolower(mysqli_real_escape_string($db, $_POST['lastname']));
        $secondattempt = strtolower(mysqli_real_escape_string($db, $_POST['firstname'])) . substr(strtolower(mysqli_real_escape_string($db, $_POST['lastname'])), 0, 1);
        $thirdattempt = substr(strtolower(mysqli_real_escape_string($db, $_POST['firstname'])), 0, 1) . strtolower(mysqli_real_escape_string($db, $_POST['lastname'])) . $random;
        $fourthattempt = strtolower(mysqli_real_escape_string($db, $_POST['firstname'])) . substr(strtolower(mysqli_real_escape_string($db, $_POST['lastname'])), 0, 1) . $random2;
        //echo "<script>alert('" . $firstattempt . " " . $secondattempt . " " . $thirdattempt . " " . $fourthattempt . "')</script>";
        $sqlcheckone = "SELECT username FROM users WHERE username='$firstattempt'";
        $resultcheckone = mysqli_query($db, $sqlcheckone);
        $sqlchecktwo = "SELECT username FROM users WHERE username='$secondattempt'";
        $resultchecktwo = mysqli_query($db, $sqlchecktwo);
        $sqlcheckthree = "SELECT username FROM users WHERE username='$thirdattempt'";
        $resultcheckthree = mysqli_query($db, $sqlcheckthree);
        $sqlcheckfour = "SELECT username FROM users WHERE username='$fourthattempt'";
        $resultcheckfour = mysqli_query($db, $sqlcheckfour);
        if (mysqli_num_rows($resultcheckone) == 0) {
            //echo "<script>Alert.render('" . $firstattempt . "', '')</script>";
            $newusername = $firstattempt;
        } elseif (mysqli_num_rows($resultchecktwo) == 0) {
            //echo "<script>Alert.render('" . $secondattempt . "', '')</script>";
            $newusername = $secondattempt;
        } elseif (mysqli_num_rows($resultcheckthree) == 0) {
            //echo "<script>Alert.render('" . $thirdattempt . "', '')</script>";
            $newusername = $thirdattempt;
        } elseif (mysqli_num_rows($resultcheckfour) == 0) {
            //echo "<script>Alert.render('" . $fourthattempt . "', '')</script>";
            $newusername = $fourthattempt;
        } else {
            echo "<script>Alert.render('No se ha podido crear el usuario en el momento. Por favor intente otra vez', '')</script>";
        }
        if (isset($newusername)) {
            $password = generatePassword("16");
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $title = mysqli_real_escape_string($db, $_POST['title']);
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);
            if ($title == "Gerente") {
                $code = mysqli_real_escape_string($db, $_POST['code']);
            } else {
                $code = "n/a";
            }
            $new = "yes";
            //echo "<script>Alert.render('Username: " . $newusername . ", Password: " . $password . ", Email: " . $email . ", Title: " . $title . ", Code: " . $code . ", New password: " . $hashpassword . "', '')</script>";
            include 'config.php';

            $stmt2 = $db->prepare("INSERT INTO `users` ( `username`, `password`, `title`, `code`, `email`, `new` ) VALUES ( ?, ?, ?, ?, ?, ? )");

            $stmt2->bind_param("ssssss", $bindusername, $bindpassword, $bindtitle, $bindcode, $bindemail, $bindnew);
            $bindusername = $newusername;
            $bindpassword = $hashpassword;
            $bindtitle = $title;
            $bindcode = $code;
            $bindemail = $email;
            $bindnew = $new;
            $stmt2->execute();

            $stmt2->close();


            $thread = $db->thread_id;
            $db->kill($thread);
            echo "<script>Alert.render('Se ha creado el usuario " . $newusername . "', '')</script>";
            if ($title == "Gerente") {
                if (!file_exists('videos/' . $code)) {
                    mkdir('videos/' . $code, 0777, true);
                }
            }
            $to = $email;
            $subject = "Hoteles City Express";
            $message = '
<html><head><link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"><title>Hoteles City Express</title><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"><style>*{font-family: "Roboto", sans-serif; color: #07399A; font-size: 20px;}</style></head><body bgcolor="#07399A">
<div style="background-color: #07399A; width: 100%; height: 100%"><div style="margin: 15px; background-color: white; border-radius: 25px; -webkit-box-shadow: 0 4px 6px -6px #222; -moz-box-shadow: 0 4px 6px -6px #222; box-shadow: 0 4px 6px -6px #222; padding: 10px; margin-bottom: 15px !important;"><div style="margin: 5px;"><center><img width="30%" src="https://frank.fabregat.com.mx/cevideo/images/favicon.png" /></center></div><center><a style="font-size: 25px !important;  margin-bottom: 100px;">' . ucfirst(strtolower(mysqli_real_escape_string($db, $_POST['firstname']))) . ' ' . ucfirst(strtolower(mysqli_real_escape_string($db, $_POST['lastname']))) . '</a></center><div style="margin-top: 30px;"><center><a style="font-size: 20px;">Usted ha sido a&ntilde;adido al portal de videos de lobby de Hoteles City Express como ' . $title . '. Puede ingresar haciendo click <a style="font-size: 20px;" href="https://frank.fabregat.com.mx/cevideo/index.php">aqui</a>, y su informacion para ingresar es la siguiente:</a></center></div><div style="margin-top: 30px;" style="font-size: 25px !important;"><center>Nombre de Usuario: ' . $newusername . '<br>Contrase&ntilde;a: ' . $password . '</center></div><div style="margin-top: 30px;"><center><a style="font-size: 20px;">Una vez que haya iniciado sesi&oacute;n en el portal, se le va a requerir cambiar la contrase&ntilde;a a la que usted elija.</a></center></div></div>
</body></html>
';
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $headers[] = 'From: noreply@hotelescity.com';
            mail($to, $subject, $message, implode("\r\n", $headers));
        }
    } ?>
<form class="adduserform" method="post" action="">
	<div class="oneinput"><label>Primer Nombre <a class="required">*</a></label><input type="text" id="noSpace" name="firstname" maxlength="16" placeholder="Primer Nombre" required /></div>
	<div class="oneinput"><label>Apellido <a class="required">*</a></label><input type="text" id="noSpace" name="lastname" maxlength="16" placeholder="Apellido" required /></div>
	<div class="oneinput"><label>Email <a class="required">*</a></label><input type="email" id="noSpace" name="email" placeholder="Email" required /></div>
	<!--<select name="title" onchange='CheckTitle(this.value);'>-->
   <div class="oneinput"><label>Titulo <a class="required">*</a></label><select name="title">
    <option value="Gerente">Gerente</option>
    <option value="Coorporativo">Coorporativo</option>
    <option value="Administrador">Administrador</option>
	   </select></div>
	<div class="oneinput"><label>Código de Hotel </label><input type="text" name="code" id="code" placeholder="Código de hotel"/></div>
	<input type="submit" name="adduser" value="Crear Usuario" />
	<script>
	/*function CheckTitle(val){
 var element=document.getElementById('code');
 if(val=='Gerente')
   element.style.display='block';
 else
   element.style.display='none';
}*/
	$("input#noSpace").on({
  keydown: function(e) {
    if (e.which === 32)
      return false;
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});
	</script>
</form>
<?php
?><div class="title"><a>Gerentes</a></div><?php
    include 'config.php';
    $sqlgetgerentes = "SELECT * FROM users WHERE title='Gerente' ORDER BY username ASC";
    $resultgetgerentes = mysqli_query($db, $sqlgetgerentes); ?><div class="userslist"><?php
if (mysqli_num_rows($resultgetgerentes) == 0) {
        ?><div class='listitem'><div class='itempart'><a>No hay gerentes registrados en este momento.</a></div></div><?php
    } else {
        while ($rowg = mysqli_fetch_assoc($resultgetgerentes)) {
            echo "<div class='listitem'><div class='itempart'><a>" . $rowg['username'] . "</a></div><div class='itempart'><a>" . $rowg['title'] . "</a></div><div class='itempart'><a>Hotel: " . $rowg['code'] . "</a></div><div class='itempartright'>"; ?><a href='index.php?page=usuarios&deleteuser=<?php echo $rowg['id']; ?>'><?php echo "<span class='icon-remove'></span></a></div></div>";
        }
    } ?>
</div>
<?php
    ?><div class="title"><a>Coorporativos</a></div><?php
include 'config.php';
    $sqlgetcoorp = "SELECT * FROM users WHERE title='Coorporativo' ORDER BY username ASC";
    $resultgetcoorp = mysqli_query($db, $sqlgetcoorp); ?><div class="userslist"><?php
if (mysqli_num_rows($resultgetcoorp) == 0) {
        ?><div class='listitem'><div class='itempart'><a>No hay coorporativos registrados en este momento.</a></div></div><?php
    } else {
        while ($rowc = mysqli_fetch_assoc($resultgetcoorp)) {
            echo "<div class='listitem'><div class='itempart'><a>" . $rowc['username'] . "</a></div><div class='itempart'><a>" . $rowc['title'] . "</a></div><div class='itempartright'>"; ?><a href='index.php?page=usuarios&deleteuser=<?php echo $rowc['id']; ?>'><?php echo "<span class='icon-remove'></span></a></div></div>";
        }
    } ?>
</div>
<?php
    ?><div class="title"><a>Administradores</a></div><?php
include 'config.php';
    $sqlgetadmin = "SELECT * FROM users WHERE title='Administrador' ORDER BY username ASC";
    $resultgetadmin = mysqli_query($db, $sqlgetadmin); ?><div class="userslist"><?php
if (mysqli_num_rows($resultgetadmin) == 0) {
        ?><div class='listitem'><div class='itempart'><a>No hay administradores registrados en este momento.</a></div></div><?php
    } else {
        while ($rowa = mysqli_fetch_assoc($resultgetadmin)) {
            if ($rowa['username'] == $_SESSION['username']) {
                echo "<div class='listitem'><div class='itempart'><a>" . $rowa['username'] . "</a></div><div class='itempart'><a>" . $rowa['title'] . "</a></div></div>";
            } else {
                echo "<div class='listitem'><div class='itempart'><a>" . $rowa['username'] . "</a></div><div class='itempart'><a>" . $rowa['title'] . "</a></div><div class='itempartright'>"; ?><a href='index.php?page=usuarios&deleteuser=<?php echo $rowa['id']; ?>'><?php echo "<span class='icon-remove'></span></a></div></div>";
            }
        }
    } ?>
</div>
<?php
    ?><div class="title"><a>Desarrolladores</a></div><?php
include 'config.php';
    $sqlgetdev = "SELECT * FROM users WHERE title='Desarrollador' ORDER BY username ASC";
    $resultgetdev = mysqli_query($db, $sqlgetdev); ?><div class="userslist"><?php
if (mysqli_num_rows($resultgetdev) == 0) {
        ?><div class='listitem'><div class='itempart'><a>No hay desarrolladores registrados en este momento.</a></div></div><?php
    } else {
        while ($rowd = mysqli_fetch_assoc($resultgetdev)) {
            if ($rowd['username'] == $_SESSION['username']) {
                echo "<div class='listitem'><div class='itempart'><a>" . $rowd['username'] . "</a></div><div class='itempart'><a>" . $rowd['title'] . "</a></div></div>";
            } else {
                echo "<div class='listitem'><div class='itempart'><a>" . $rowd['username'] . "</a></div><div class='itempart'><a>" . $rowd['title'] . "</a></div><div class='itempartright'>"; ?><a href='index.php?page=usuarios&deleteuser=<?php echo $rowd['id']; ?>'><?php echo "<span class='icon-remove'></span></a></div></div>";
            }
        }
    } ?>
</div>
<?php
} else {
        echo '<script type="text/javascript">
          window.location = "https://frank.fabregat.com.mx/cevideo/index.php"
      </script>';
    }
?>
