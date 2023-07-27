<?php
if(isset($_POST['submit'])){
    if(isset($_POST['categorie'])){

    $categorie = htmlspecialchars($_POST['categorie'] , ENT_QUOTES | ENT_HTML5 | ENT_DISALLOWED, 'UTF-8');
    
    $insert = $pdo ->prepare('INSERT INTO categorie(categorie) VALUES (:categorie)');
    $insert -> bindValue('categorie', $categorie);
    $insert -> execute();
    }
}
$req= $pdo->prepare('SELECT * FROM categorie');
$req -> execute();
$categories = $req->fetchAll();