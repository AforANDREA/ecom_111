<?php
try {
    //echo"in try block";
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "electronics111";
    $dsn = "mysql:host=$server; dbname=$db";
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //echo"connection got";
} catch (PDOException $e) {
    echo $e->getMessage();
}
