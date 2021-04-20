<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "userinfo";

$connectionString = mysqli_connect($host,$user,$password,$database);// we go fit change the dollar all for the php inside    mysqli_connect be php syntax


if (!$connectionString) {
    die("Connection failed: " . mysqli_connect_error());
}


?>