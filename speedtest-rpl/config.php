<?php
$conn = new mysqli("localhost", "root", "", "speedtest_db");
if ($conn->connect_error) {
    die("DB ERROR: " . $conn->connect_error);
}
