<?php 
try{
    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];
    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce_maillot;charset=utf8', 'root' , '', $options);

}catch (Exception $e){
    echo 'ERREUR : '.$e->getMessage();
}


