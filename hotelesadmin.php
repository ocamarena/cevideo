<?php
if ($_SESSION['title'] == "Administrador" or $_SESSION['titledev'] == "Administrador") {
	?>
<title>Video Manager | Hoteles</title>
<?php
  ?>
  <center><div class="title"><a>Hoteles</a></div></center><?php
?><div class="title"><a>Agregar Hotel</a></div>
  <form class="adduserform" method="post" action="">
  <div class="oneinput"><label>Código de Hotel </label><input type="text" style="text-transform:uppercase" maxlength="5" name="code" id="noSpace" placeholder="Código de hotel"/></div>
  <div class="oneinput"><label>IP 192.168.</label><input type="number" name="ip" id="code" min="1" max="999" placeholder="000"/>.51</div>
  <input type="submit" name="addhotel" value="Agregar Hotel" />
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
  <div class="title"><a>Hoteles</a></div>
  <?php
include 'config.php';
    $sqlgeth = "SELECT * FROM hoteles ORDER BY code ASC";
    $resultgeth = mysqli_query($db, $sqlgeth); ?><div class="userslist"><?php
if (mysqli_num_rows($resultgeth) == 0) {
        ?><div class='listitem'><div class='itempart'><a>No existen hoteles.</a></div></div><?php
    } else {
        while ($rowa = mysqli_fetch_assoc($resultgeth)) {
			if ($rowa['code'] == "ce000") {
				if ($_SESSION['title'] == "Desarrollador") {
                echo "<div class='listitem'><div class='itempart'><a>" . strtoupper($rowa['code']) . "</a></div><div class='itempart'><a>" . $rowa['ip'] . "</a></div></div>";
				}
            } else {
                echo "<div class='listitem'><div class='itempart'><a>" . strtoupper($rowa['code']) . "</a></div><div class='itempart'><a>" . $rowa['ip'] . "</a></div><div class='itempartright'>"; ?><a href='index.php?page=hotelesadmin&deletehotel=<?php echo $rowa['id']; ?>'><?php echo "<span class='icon-remove'></span></a></div></div>";
        }}
    } ?>
</div>
  <?php
} else {
  echo '<script type="text/javascript">
        window.location = "index.php"
    </script>';
}
