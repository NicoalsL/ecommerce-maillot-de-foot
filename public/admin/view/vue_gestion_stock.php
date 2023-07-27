<?php 
if(isset($_GET['id'])) {
    $idProduitFini = (int)$_GET['id'];

    $req = $pdo -> prepare('DELETE FROM produit_fini WHERE Id_produit_fini = :Id_produit_fini ');
    $req -> bindValue('Id_produit_fini', $idProduitFini, PDO::PARAM_INT);
    $req -> execute();
}

$req= $pdo->prepare('SELECT * FROM `produits` 
                        INNER JOIN `club`,`type_maillot`,`tarification`, `affiliation`, `equipementier`,`categorie`,`championnat`, `saison`, `stocker`, `produit_fini`, `taille`
                        WHERE produits.Id_saison = saison.Id_saison
                        AND produits.Id_type_maillot = type_maillot.Id_type_maillot
                        AND produits.Id_club = club.Id_club
                        AND produits.Id_categorie = categorie.Id_categorie
                        AND produits.Id_championnat = championnat.Id_championnat
                        AND produits.Id_produits = tarification.Id_produits
                        AND affiliation.Id_equipementier = equipementier.Id_equipementier
                        AND affiliation.Id_club = club.Id_club
                        AND produit_fini.Id_produit_fini = stocker.Id_produit_fini
                        AND produit_fini.Id_produits = produits.Id_produits
                        AND taille.Id_taille = stocker.Id_taille
                        ORDER BY `produits`.`Id_produits` ASC
');
$req -> execute();
$produits = $req->fetchAll();
?>
<div class="container text-center">
<table class="table">
        <thead>
    <th scope="col">Id</th>
    <th scope="col">Image</th>
    <th scope="col">Saison</th>
    <th scope="col">Couleur</th>
    <th scope="col">Chanpionnat</th>
    <th scope="col">Type maillot</th>
    <th scope="col">Categorie</th>
    <th scope="col">Club</th>
    <th scope="col">Equipementier</th>
    <th scope="col">Prix</th>
    <th scope="col">Quantite</th>
    <th scope="col">Taille</th>
    <th scope="col">Suppression</th>
</thead>
<?php foreach ($produits as $produit): ?>
        <tr>
            <th>
                <?=$produit['Id_produit_fini']?>
            </th>

            <td>
                <img src="../../assets/images/<?=$produit['image']?>" width="75px">
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
                <?=$produit['quantite']?>
            </td>
            <td>
                <?=$produit['libeller']?>
            </td>
            <td>
            <a  href="?page=vue_stock&id=<?=$produit['Id_produit_fini'] ?>" onclick="return(confirm('Voulez vous supprimer ce produit ?'))"><i class="fa-solid fa-delete-left" style="color: #1ABC9c;"></i></a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>

    </div>

<style>
    h1{
        font-weight: bold;
    }
    .contenaire_article{
        display: flex;
        flex-direction: row;
    }
    form{
        display: flex;
        flex-direction: column;
        width: 350px;
        font-weight: bold;
    }
    form p {
        margin: 10px 0;
        padding: 0;
    }
    table{
        margin: 50px;
    }
    td{
        padding: 0 10px ;
        min-width: 100px;
        text-align: center;
        border: 1px solid black;
    }
    </style>
    