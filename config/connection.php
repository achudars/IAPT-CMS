<?php

    try {
        //$pdo = new PDO("mysql:host=localhost;dbname=iaptdb", "root", "");
        $pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        exit("Database error.");
    }


?>