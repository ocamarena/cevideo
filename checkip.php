<?php
include 'config.php';
if (isset($_GET['ip'])) {
    $ips = $_GET['ip'];
    $sqli = "SELECT code FROM hoteles WHERE ipcode='$ips'";
    $result = mysqli_query($db, $sqli);
    if (mysqli_num_rows($result) == 0) {
        $code = "ERROR";
    } else {
        $row = mysqli_fetch_assoc($result);
        $code = $row['code'];
    }
    $array = array('code' => $code);
    echo json_encode($array);
    //echo "Code: ".$code;
} elseif (isset($_GET['version']) && isset($_GET['code'])) {
    include 'config.php';
    $version = $_GET['version'];
    $code = $_GET['code'];
    $sql = "SELECT version FROM hoteles WHERE code='$code'";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) == 0) {
        $update = "ERROR";
    } else {
        $row = mysqli_fetch_assoc($result);
        $version2 = $row['version'];
        if ($version2 > $version) {
            $update = "yes";
        } else {
            $update = "no";
        }
    }
    $array = array('update' => $update, 'version' => $version2);
    echo json_encode($array);
}
