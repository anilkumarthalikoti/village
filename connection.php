<?php
$mysqli = mysqli_connect("localhost", "root", "1234", "farmer");

if (!$mysqli) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
echo "Connected sucessfully";
mysqli_close($mysqli);
?>