<?php
require "../config.php";

$ping = $_POST['ping'];
$download = $_POST['download'];
$upload = $_POST['upload'];

$conn->query("
    INSERT INTO hasil_tes (ping, download, upload, waktu_tes)
    VALUES ($ping, $download, $upload, NOW())
");
