<?php
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
        echo "<script>Alert.render('Se ha eliminado la cuenta \'$username\'', '');</script>";
    } else {
        echo "<script>Alert.render('Contraseña incorrecta. Por favor intenta de nuevo.', '');</script>";
    }
}
