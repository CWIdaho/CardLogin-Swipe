<?php
//try to connect to the database
try {
    $pdo = new PDO('mysql:host=localhost;dbname=matsdb', 'root', 'password'); //save connection as a variable
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //identify specific kinds of exceptions to format
    $pdo->exec('SET NAMES "utf8"'); //use UTF-8 character set
}
//connection fail
catch(PDOException $e) {
    $output = 'Database connection fail.' . '<br/>' . $e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'] .'/shared/output.php';
    exit();
}
?>