<?php

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=iaptdb", "root", "");
    } catch (PDOException $e) {
        exit("Database error.");
    }


?>