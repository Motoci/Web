<?php

 $serverName = "localhost";
 $dbUserName = "root";
 $dbPassword = "root";
 $dbName = "Library";

 global $conn;
 $conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

 if (!$conn) {
     die("Connection error: " . mysqli_connect_error());
 }