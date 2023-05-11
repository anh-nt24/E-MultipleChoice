<?php
error_reporting(E_ALL);
    $file = '../../upload/report/'.$_GET['url'];
    header("Expires: 0");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $basename = pathinfo($file, PATHINFO_BASENAME);

    header("Content-type: application/".$ext);
    header('Content-length: '.filesize($file));
    header("Content-Disposition: attachment; filename=\"$basename\"");
    readfile($file);
    // exit;
?>