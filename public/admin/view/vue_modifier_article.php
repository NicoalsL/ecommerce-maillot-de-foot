<?php

if(isset($_POST['submit'])){

    if(isset($_GET['id'], $_FILES['image'], $_POST['saison'], $_POST['couleur'], $_POST['championnat'],$_POST['categorie'], $_POST['type_maillot'], $_POST['club'] , $_POST['prix'], $_POST['prix'])){
        $idproduit = (int)$_GET['id'];
        $image = $_FILES['image'];
        $idSaison = (int)$_POST['saison'];
        $couleur = htmlspecialchars($_POST['couleur'], ENT_QUOTES, 'UTF-8');
        $idChampionnat = (int)$_POST['championnat'];
        $idCategorie = (int)$_POST['categorie'];
        $idTypeMaillot = (int)$_POST['type_maillot'];
        $idClub = (int)$_POST['club'];
        $prix = (int)$_POST['prix'];

        $dossier = "../../assets/images/";


        $nom = "maillot".$idClub.$idTypeMaillot;

    $dossierTempo = $_FILES['image']['tmp_name'];
    $dossierSite = '../../assets/images/'.$_FILES['image']['name'];
    
    if(move_uploaded_file($dossierTempo, $dossierSite)){
        echo "Fichier téléchargé avec succès.";
    } else {
        echo "Erreur lors du téléchargement du fichier.";
    }




$update = $pdo -> prepare('UPDATE produits SET image = :image, couleur = :couleur, Id_saison = :Id_saison,
 Id_type_maillot = :Id_type_maillot, Id_championnat = :Id_championnat, Id_club = :Id_club, Id_categorie = :Id_categorie WHERE Id_produits = :Id_produits');
$update -> bindValue('Id_produits', $idproduit, PDO::PARAM_INT);
$update -> bindValue('image', $_FILES['image']['name']);
$update -> bindValue('couleur', $couleur);
$update -> bindValue('Id_saison', $idSaison, PDO::PARAM_INT);
$update -> bindValue('Id_type_maillot', $idTypeMaillot, PDO::PARAM_INT);
$update -> bindValue('Id_championnat', $idChampionnat, PDO::PARAM_INT);
$update -> bindValue('Id_club', $idClub, PDO::PARAM_INT);
$update -> bindValue('Id_categorie', $idCategorie, PDO::PARAM_INT);
$update -> execute();

$updateTarification  = $pdo -> prepare('UPDATE tarification SET prix = :prix WHERE Id_produits = :Id_produits');
$updateTarification  -> bindValue('Id_produits', $idproduit, PDO::PARAM_INT);
$updateTarification  -> bindValue('prix', $prix, PDO::PARAM_INT);
$updateTarification  -> execute();


    }
}





$req= $pdo->prepare('SELECT * FROM `produits` 
                        INNER JOIN `club`,`type_maillot`,`tarification`, `affiliation`, `equipementier`,`categorie`,`championnat`, `saison`
                        WHERE produits.Id_saison = saison.Id_saison
                        AND produits.Id_type_maillot = type_maillot.Id_type_maillot
                        AND produits.Id_club = club.Id_club
                        AND produits.Id_categorie = categorie.Id_categorie
                        AND produits.Id_championnat = championnat.Id_championnat
                        AND produits.Id_produits = tarification.Id_produits
                        AND affiliation.Id_equipementier = equipementier.Id_equipementier
                        AND affiliation.Id_club = club.Id_club
                        ORDER BY `produits`.`Id_produits` ASC
');


$req -> execute();
$produits = $req->fetchAll();

$req= $pdo->prepare('SELECT * FROM type_maillot');
$req -> execute();
$typeMaillots = $req->fetchAll();


$req= $pdo->prepare('SELECT * FROM taille ');
$req -> execute();
$stocks = $req->fetchAll();

$req= $pdo->prepare('SELECT * FROM saison');
$req -> execute();
$saisons = $req->fetchAll();

$req= $pdo->prepare('SELECT * FROM championnat');
$req -> execute();
$championnats = $req->fetchAll();

$req= $pdo->prepare('SELECT * FROM categorie');
$req -> execute();
$categories = $req->fetchAll();



$req= $pdo->prepare('SELECT * FROM `club` ORDER BY `club`.`club` ASC
');
$req -> execute();
$clubs = $req->fetchAll();

?>


    <div class="container text-center">
    <div class="row align-items-center">
    <div class="col-2">
</div>
<div class="col-8 d-flex justify-content-center">
<h1>Article</h1>

</div>
<div class="col-2">
</div>
</div>
    <div class="row align-items-center">


<div class="col-2 blue">
</div>
<div class="col-8">

    <form method="POST" enctype="multipart/form-data" class="rouge">
    <select class="form-control"name="club" id="club">
            <?php foreach ($clubs as $club): ?>
            <option value="<?=$club['Id_club']?>"><?=$club['club']?></option>
            <?php endforeach ?>
        </select>
        <br>
        <select name="type_maillot" id="type_maillot">
            <?php foreach ($typeMaillots as $typeMaillot): ?>
            <option value="<?=$typeMaillot['Id_type_maillot']?>"><?=$typeMaillot['type_maillot']?></option>
            <?php endforeach ?>
        </select>
        <br>
        <select class="form-control"name="categorie" id="categorie">
            <?php foreach ($categories as $categorie): ?>
            <option value="<?=$categorie['Id_categorie']?>"><?=$categorie['categorie']?></option>
            <?php endforeach ?>
        </select>
        <br>
        <p>Chanpionnat</p>
        <select class="form-control"name="championnat" id="categorie">
            <?php foreach ($championnats as $championnat): ?>
            <option value="<?=$championnat['Id_championnat']?>"><?=$championnat['championnat']?></option>
            <?php endforeach ?>
        </select>
        <br>
        <select class="form-control"name="saison" id="saison">
            <?php foreach ($saisons as $saison): ?>
            <option value="<?=$saison['Id_saison']?>"><?=$saison['saison']?></option>
            <?php endforeach ?>
        </select>
        <br>
        <p>Image</p>
        <input class="form-control" name="image" type="file" placeholder="image" required="required">
        <p>Couleur</p>
        <input class="form-control" name="couleur"type="text" placeholder="couleur" required="required">
        <p>Prix</p>
        <input class="form-control" name="prix" type="number" placeholder="prix" required="required">
        <p>*En décimal</p>
        <br>


        <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Valider</button>
</form>

</div>
<div class="col-2">
</div>
</div>
</div>