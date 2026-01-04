<?php
require "../config.php";

if (!isset($_GET['id']) || $_GET['id'] === '') {
    die("ID tidak valid");
}

$id = (int) $_GET['id'];

$conn->query("DELETE FROM hasil_tes WHERE hasil_id = $id");

header("Location: ../history.php");
exit;
