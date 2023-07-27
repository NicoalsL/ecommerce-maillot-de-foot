<?php

if (isset($_GET['id'], $_GET['categorie'])) {
    $idProduit = (int)$_GET['id'];
    $categorie = htmlspecialchars($_GET['categorie']);

// selectionner le produit depuis l'url
    $req = $pdo->prepare('SELECT * FROM `produits` 
                                INNER JOIN `club`,`type_maillot`,`tarification`, `affiliation`, `equipementier`,`categorie`,`championnat`, `saison`
                                WHERE produits.Id_produits = :id
                                AND produits.Id_saison = saison.Id_saison
                                AND produits.Id_type_maillot = type_maillot.Id_type_maillot
                                AND produits.Id_club = club.Id_club
                                AND produits.Id_categorie = categorie.Id_categorie
                                AND produits.Id_championnat = championnat.Id_championnat
                                AND produits.Id_produits = tarification.Id_produits
                                AND affiliation.Id_equipementier = equipementier.Id_equipementier
                                AND affiliation.Id_club = club.Id_club
                                ORDER BY `produits`.`Id_produits` ASC
');
    $req->bindValue(':id', $idProduit, PDO::PARAM_INT);
    $req->execute();
    $produit = $req->fetch();


// selectionner les tailles disponibles selon la categorie de l'article depuis l'url

    $req = $pdo->prepare('SELECT * FROM unite_valeur
                                INNER JOIN `categorie`, `taille`
                                WHERE categorie.categorie = :categorie
                                AND categorie.Id_categorie = unite_valeur.Id_categorie
                                AND taille.Id_taille = unite_valeur.Id_taille
');
    $req->bindValue(':categorie', $categorie);
    $req->execute();
    $tailles = $req->fetchAll();



// recuprerer les quantiter ajouter

    if (isset($_POST['quantiter'])) {

        foreach ($_POST['quantiter'] as $key => $quantite) {
            // filtrer les produits fini qui on deja recu une quantiter
            $request = $pdo->prepare('SELECT * FROM produit_fini WHERE Id_taille = :Id_taille AND Id_produits = :Id_produits');
            $request->bindValue('Id_taille', $tailles[$key]['Id_taille'], PDO::PARAM_INT);
            $request->bindValue('Id_produits', $idProduit, PDO::PARAM_INT);
            $request->execute();
            $count = $request->rowCount();
            

            // n'accepeter que les produits n'ayans pas de quantiter
            if ($count <= 0) {

                // cree le produit fini pour chaque taille ajouter a un produits

                $insert = $pdo->prepare('INSERT INTO produit_fini( Id_taille, Id_produits) VALUES (:Id_taille, :Id_produits)');
                $insert->bindValue('Id_taille', $tailles[$key]['Id_taille'], PDO::PARAM_INT);
                $insert->bindValue('Id_produits', $idProduit, PDO::PARAM_INT);
                $insert->execute();

                $insert = $pdo->prepare('INSERT INTO stocker(Id_produit_fini, Id_taille, quantite) VALUES (:Id_produit_fini, :Id_taille, :quantite)');
                $insert->bindValue('Id_produit_fini', $pdo->lastInsertId()) .
                    $insert->bindValue('Id_taille', $tailles[$key]['Id_taille'], PDO::PARAM_INT) .
                    $insert->bindValue('quantite', $quantite, PDO::PARAM_INT) .
                    $insert->execute();

            } else {
                
                $produitExistant  = $request->fetch();
                $idProduitFiniExistant = $produitExistant['Id_produit_fini'];
                
                $reqStock  = $pdo->prepare('SELECT * FROM stocker 
                                            WHERE Id_produit_fini = :Id_produit_fini 
                                            AND Id_taille = :Id_taille');
                $reqStock->bindValue('Id_produit_fini', $idProduitFiniExistant, PDO::PARAM_INT);
                $reqStock->bindValue('Id_taille', $tailles[$key]['Id_taille'], PDO::PARAM_INT);
                $reqStock->execute();
                $rowStock = $reqStock->fetch();

                $quantiteExistante  = $rowStock['quantite'];
                $newQuantite = $quantiteExistante + $quantite;
    
                $update = $pdo->prepare('UPDATE stocker SET quantite = :quantite WHERE Id_produit_fini = :Id_produit_fini AND Id_taille = :Id_taille ');
                $update->bindValue('quantite', $newQuantite, PDO::PARAM_INT);
                $update->bindValue('Id_produit_fini', $rowStock['Id_produit_fini'], PDO::PARAM_INT);
                $update->bindValue('Id_taille', $tailles[$key]['Id_taille'], PDO::PARAM_INT);
                $update->execute();

            }
        }
    }
?>
<div class="container text-center">
<div class="row">
<div class="col-2">
</div>

    <table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Saison</th>
            <th>Couleur</th>
            <th>Chanpionnat</th>
            <th>Type maillot</th>
            <th>Categorie</th>
            <th>Club</th>
            <th>equipementier</th>
            <th>prix</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <?= $produit['Id_produits'] ?>
            </td>
            <td>
                <img src="../../assets/images/<?= $produit['image'] ?>" width="150px">
            </td>
            <td>
                <?= $produit['saison'] ?>
            </td>
            <td>
                <?= ucfirst($produit['couleur']) ?>
            </td>
            <td>
                <?= ucfirst($produit['championnat']) ?>
            </td>
            <td>
                <?= $produit['type_maillot'] ?>
            </td>
            <td>
                <?= ucfirst($produit['categorie']) ?>
            </td>
            <td>
                <?= $produit['club'] ?>
            </td>
            <td>
                <?= $produit['equipementier'] ?>
            </td>
            <td>
                <?= $produit['prix'] / 100 ?>€
            </td>
        </tr>
        </tbody>
    </table>



    <form method="post">
    <table  class="table">
    <thead>
        <tr>
            <td>Categorie</td>
            <td>Taille</td>
            <td>Stock</td>
        </tr>
        </thead>
        <tbody>
            
            <?php foreach ($tailles as $taille) : ?>
                <tr>
                    <td><?= ucfirst($taille['categorie']) ?></td>
                    <td><?= ucfirst($taille['libeller']) ?></td>
                    <td><input class="form-control" type="number" name="quantiter[]" id="quantiter" placeholder="Quantité" required="required"></td>
                </tr>
                <?php endforeach ?>
            </tbody>
    </table>
    <button  class="btn btn-primary vert" type="submit" name="submit" value="submit">Valider</button>
    </form>
<?php } ?>
</div>
</div>
<style>
    h1 {
        font-weight: bold;
    }
        form {

        width: 350px;
        font-weight: bold;
    }
    .vert{
        background-color: #1ABC9c !important;
        border: none !important;

    }
    /* h1 {
        font-weight: bold;
    }

    .contenaire_article {
        display: flex;
        flex-direction: row;
    }



    form p {
        margin: 10px 0;
        padding: 0;
    }

    table {
        margin: 50px;
    }

    td {
        padding: 10px;
        min-width: 100px;
        text-align: center;
        border: 1px solid black;
    } */
</style>