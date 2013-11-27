<?php

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=cms", "root", "");
    } catch (PDOException $e) {
        exit("Database error.");
    }


?>