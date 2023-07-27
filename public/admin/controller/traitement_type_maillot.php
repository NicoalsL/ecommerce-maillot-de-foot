<?php
if(isset($_POST['submit'])){
    if(isset($_POST['type_maillot'])){

    $typeMaillot = htmlspecialchars($_POST['type_maillot'], ENT_QUOTES | ENT_HTML5 | ENT_DISALLOWED, 'UTF-8');
    $insert = $pdo ->prepare('INSERT INTO type_maillot(type_maillot) VALUES ( :type_maillot)');
    $insert -> bindValue('type_maillot', $typeMaillot);
    $insert -> execute();
    }
}

$req = $pdo -> prepare('SELECT * FROM type_maillot');
$req -> execute();
$typeMaillots = $req->fetchAll();