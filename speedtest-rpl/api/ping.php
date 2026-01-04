<?php
$start = microtime(true);
usleep(rand(10000, 50000)); // simulasi delay server
$end = microtime(true);

$ping = round(($end - $start) * 1000);
echo json_encode(["ping" => $ping]);
