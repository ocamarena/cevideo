function CustomAlert(){
  this.render = function(dialog, idofuser){
	var winW = window.innerWidth;
	var winH = window.innerHeight;
	var dialogoverlay = document.getElementById('dialogoverlay');
	var dialogbox = document.getElementById('dialogbox');
	dialogoverlay.style.display = "block";
	dialogoverlay.style.height = winH+"px";
	dialogbox.style.left = (winW/2) - (550 * .5)+"px";
	dialogbox.style.top = "100px";
	dialogbox.style.display = "block";
var php = `<script type="text/javascript" src="customalert.js"></script><?php
echo "asdasdasd";
if (isset($_POST['deleteuserprompt'])) {
	include 'config.php';
	$password = mysqli_real_escape_string($db, $_POST['prompt']);
	$id = mysqli_real_escape_string($db, $_POST['id']);
	$sqlgetpass = "SELECT password, username FROM users WHERE id='$id'";
$resultgetpass = mysqli_query($db, $sqlgetpass);
	$row = mysqli_fetch_assoc($resultgetpass);
	$username = $row['username'];
	$passverify = password_verify($password, $row['password']);
	if ($passverify) {
		echo "asd";
	} else {
		echo "qwe";
	}
}
?>`;
	  
	dialogbox.innerHTML = `${php}<form action="" method="post"><div id='dialogboxhead'><img src='https://www.cityexpress.com/themes/city_express/images/favicons/favicon-114x114.png'></img></div>
				<div id='dialogboxbody'>${dialog}
                <br><center><input type="password" maxlength="36" name="prompt" placeholder="Contraseña" required /><input type="hidden" value="${idofuser}" name="id"></center></div>
				<div id='dialogboxfoot'><div class='alertokbtn'><input type="submit" name="deleteuserprompt" value="Continuar"></div></div></form>`;

	}
	/*this.ok = function(redirect){
		document.getElementById('dialogbox').style.display = "none";
		document.getElementById('dialogoverlay').style.display = "none";

		window.location = redirect;
	  }*/
	}
	var Prompt = new CustomAlert();