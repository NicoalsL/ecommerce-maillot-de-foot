<?php  
if(isset($_GET['id']) && (int)$_GET['id']){

    $idProduits = (int)$_GET['id'];
    $req = $pdo -> prepare('DELETE FROM produits WHERE Id_produits = :Id_produits');
    $req -> bindValue('Id_produits', $idProduits, PDO::PARAM_INT);
    $req -> execute();
    
}

if(isset($_POST['submit'])){

    if(isset($_FILES['image'], $_POST['saison'], $_POST['couleur'], $_POST['championnat'],$_POST['categorie'], $_POST['type_maillot'], $_POST['club'] , $_POST['prix'], $_POST['prix'])){
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
    } else {
    }




$insert = $pdo -> prepare('INSERT INTO produits( image, couleur, Id_saison, Id_type_maillot, Id_championnat, Id_club, Id_categorie) 
                            VALUES ( :image, :couleur, :Id_saison, :Id_type_maillot, :Id_championnat, :Id_club, :Id_categorie )');
$insert -> bindValue('image', $_FILES['image']['name']);
$insert -> bindValue('couleur', $couleur);
$insert -> bindValue('Id_saison', $idSaison, PDO::PARAM_INT);
$insert -> bindValue('Id_type_maillot', $idTypeMaillot, PDO::PARAM_INT);
$insert -> bindValue('Id_championnat', $idChampionnat, PDO::PARAM_INT);
$insert -> bindValue('Id_club', $idClub, PDO::PARAM_INT);
$insert -> bindValue('Id_categorie', $idCategorie, PDO::PARAM_INT);
$insert -> execute();
$insert = $pdo -> prepare('INSERT INTO tarification(Id_produits, prix) VALUES (:Id_produits, :prix)');
$insert -> bindValue('Id_produits', $pdo->lastInsertId(), PDO::PARAM_INT);
$insert -> bindValue('prix', $prix, PDO::PARAM_INT);
$insert -> execute();


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
    <select class="form-select" name="club" id="club">
            <?php foreach ($clubs as $club): ?>
            <option  value="<?=$club['Id_club']?>"><?=$club['club']?></option>
            <?php endforeach ?>
        </select>
        <br>
        <select class="form-select" name="type_maillot" id="type_maillot">
            <?php foreach ($typeMaillots as $typeMaillot): ?>
            <option value="<?=$typeMaillot['Id_type_maillot']?>"><?=$typeMaillot['type_maillot']?></option>
            <?php endforeach ?>
        </select>
        <br>
        <select class="form-select" name="categorie" id="categorie">
            <?php foreach ($categories as $categorie): ?>
            <option  value="<?=$categorie['Id_categorie']?>"><?=$categorie['categorie']?></option>
            <?php endforeach ?>
        </select>
        <br>
        <p>Chanpionnat</p>
        <select class="form-select" name="championnat" id="categorie">
            <?php foreach ($championnats as $championnat): ?>
            <option  value="<?=$championnat['Id_championnat']?>"><?=$championnat['championnat']?></option>
            <?php endforeach ?>
        </select>
        <br>
        <select class="form-select" name="saison" id="saison">
            <?php foreach ($saisons as $saison): ?>
            <option value="<?=$saison['Id_saison']?>"><?=$saison['saison']?></option>
            <?php endforeach ?>
        </select>
        <br>
        <p>Image</p>
        <input class="form-control" name="image" type="file" placeholder="image" required="required">
        <p>Couleur</p>
        <input  class="form-control" name="couleur"type="text" placeholder="couleur" required="required">
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

<div>


    <table>
        <tr>
    <td>Id</td>
    <td>Image</td>
    <td>Saison</td>
    <td>Couleur</td>
    <td>Chanpionnat</td>
    <td>Type maillot</td>
    <td>Categorie</td>
    <td>Club</td>
    <td>equipementier</td>
    <td>prix</td>
    <td>stock</td>
    <td>modifier</td>
    <td>supprimer</td>
</tr>
<?php foreach ($produits as $produit): ?>
        <tr>
            <td>
                <?=$produit['Id_produits']?>
            </td>
            <td>
                <img src="../../assets/images/<?=$produit['image']?>" width="50px">
            </td>
            <td>
                <?=$produit['saison']?>
            </td>
            <td>
                <?=ucfirst($produit['couleur'])?>
            </td>
            <td>
                <?=ucfirst($produit['championnat'])?>
            </td>
            <td>
                <?=$produit['type_maillot'] ?>
            </td>
            <td>
                <?=ucfirst($produit['categorie'])?>
            </td>
            <td>
                <?=$produit['club']?>
            </td>
            <td>
                <?=$produit['equipementier']?>
            </td>
            <td>
                <?=$produit['prix']/100?>€
            </td>
            <td>
                <a href="?page=gestion_stock_article&id=<?= $produit["Id_produits"] ?>&categorie=<?= $produit['categorie']?>">gestion</a>
            </td>
            <td>
                <a href="?page=modification_article&id=<?= $produit["Id_produits"] ?>&modifier=<?= $produit['categorie']?>">modifier</a>
            </td>
            <td>
                <a href="?page=vue_article&id=<?= $produit["Id_produits"] ?>">supprimer</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>

</div>
</div>
</div>
    
    
<style>

    td{
        padding: 10px;
        min-width: 100px;
        text-align: center;
        border: 1px solid black;
    }


    </style>
    