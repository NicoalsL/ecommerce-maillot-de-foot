<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['taille'], $_POST['ordre'], $_POST['categorie'])) {
        $taille = htmlspecialchars($_POST['taille'], ENT_QUOTES | ENT_HTML5 | ENT_DISALLOWED, 'UTF-8');
        $ordre = (int)$_POST['ordre'];
        $idCategorie = (int)$_POST['categorie'];

        $insert = $pdo->prepare('INSERT INTO taille(libeller, ordre) VALUES (:libeller, :ordre)');
        $insert->bindValue('libeller', $taille);
        $insert->bindValue('ordre', $ordre);
        $insert->execute();

        $insert = $pdo->prepare('INSERT INTO unite_valeur(Id_categorie, Id_taille) VALUES (:Id_categorie, :Id_taille)');
        $insert->bindValue('Id_categorie', $idCategorie, PDO::PARAM_INT);
        $insert->bindValue('Id_taille', $pdo->lastInsertId(), PDO::PARAM_INT);
        $insert->execute();
    }
}


$req = $pdo->prepare('SELECT * FROM categorie');
$req->execute();
$categories = $req->fetchAll();

$req = $pdo->prepare('SELECT * FROM unite_valeur
                        INNER JOIN `categorie`, `taille`
                        WHERE categorie.Id_categorie = unite_valeur.Id_categorie
                        AND taille.Id_taille = unite_valeur.Id_taille
');
$req->execute();
$uniteValeurs = $req->fetchAll();