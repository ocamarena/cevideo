<?php
if (isset($_GET['file'])) {
    if (file_exists('videos/' . $_GET['file'] . '.mp4')) {
        $exists = "yes";
    } else {
        $exists = "no";
    }
    $array = array('exists' => $exists);
    echo json_encode($array);
}
