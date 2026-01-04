<?php
$start = microtime(true);

$data = file_get_contents("php://input");
usleep(rand(20000, 60000)); // simulasi proses

$end = microtime(true);

$time = $end - $start;
$size = strlen($data); // byte

$speed = ($size * 8) / ($time * 1000000); // Mbps

echo json_encode([
    "upload" => round($speed, 2)
]);
