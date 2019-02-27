<?php

define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("NAME", "shoutbox");

// Create connection
$connect = mysqli_connect(HOST, USER, PASS, NAME);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}