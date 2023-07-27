<?php
$req = $pdo->prepare('SELECT produits.Id_produits, image, categorie, club, type_maillot, prix FROM `produits` 
                    INNER JOIN `club`, `type_maillot`, `tarification`, `categorie`
                    WHERE produits.Id_type_maillot = type_maillot.Id_type_maillot
                    AND  produits.Id_produits = tarification.Id_produits
                    AND  produits.Id_club = club.Id_club
                    AND categorie.Id_categorie = produits.Id_categorie
                    AND categorie.categorie in ("maillot")
                    ORDER BY club.club
                    ');
$req -> execute();

$maillots = $req->fetchAll();