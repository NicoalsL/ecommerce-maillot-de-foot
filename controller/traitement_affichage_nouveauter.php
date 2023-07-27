<?php


$query = $pdo->query('SELECT * FROM `produits` 
                        INNER JOIN `club`, `type_maillot`, `tarification`
                        WHERE produits.Id_type_maillot = type_maillot.Id_type_maillot
                        AND  produits.Id_produits = tarification.Id_produits
                        AND  produits.Id_club = club.Id_club
                        ');
$maillots = $query->fetchAll();


?>