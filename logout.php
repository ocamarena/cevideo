<?php
session_start();
session_destroy();
echo '<script type="text/javascript">
           window.location = "http://frank.fabregat.com.mx/cevideo/index.php"
		   </script>';
?>