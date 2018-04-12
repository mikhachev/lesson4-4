<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=phplessons', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES utf8;");

} catch (PDOException $e) {
    print "Achtung!: " . $e->getMessage() . "<br/>";
    die();
}

?>


 
    