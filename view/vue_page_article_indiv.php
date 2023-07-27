<?php require '../controller/traitement_affichage_article.php'; ?>
<?php
if (isset($_GET['id'])) {
    if (!empty($_GET['id']) && (int)$_GET['id']) {
        $id = (int)$_GET['id'];

        $req = $pdo->prepare('SELECT produits.Id_produits, image, categorie, club, type_maillot, championnat, equipementier, couleur, saison, prix FROM `produits` 
                        INNER JOIN `club`,`type_maillot`,`tarification`, `affiliation`, `equipementier`,`categorie`,`championnat`, `saison`
                        WHERE produits.Id_produits = :id
                        AND produits.Id_saison = saison.Id_saison
                        AND produits.Id_type_maillot = type_maillot.Id_type_maillot
                        AND produits.Id_championnat = championnat.Id_championnat
                        AND produits.Id_club = club.Id_club
                        AND produits.Id_categorie = categorie.Id_categorie
                        AND affiliation.Id_club = club.Id_club
                        AND affiliation.Id_equipementier = equipementier.Id_equipementier
                        AND tarification.Id_produits = produits.Id_produits
');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();


        if ($req->rowCount() > 0) {
            $produit = $req->fetch();

            if (isset($produit['categorie'], $produit['Id_produits'])) {

                $req = $pdo->prepare('SELECT taille.Id_taille, quantite, libeller 
                            FROM `taille`
                            INNER JOIN `categorie`, `unite_valeur`, `stocker`,`produit_fini`
                            WHERE categorie.categorie = :categorie
                            AND categorie.Id_categorie = unite_valeur.Id_categorie
                            AND taille.Id_taille = unite_valeur.Id_taille
                            AND taille.Id_taille = stocker.id_taille
                            AND produit_fini.Id_produits =  :Id_produits
                            AND stocker.Id_produit_fini = produit_fini.Id_produit_fini
    ');

                $req->bindValue('categorie', $produit['categorie']);
                $req->bindValue('Id_produits', $produit['Id_produits'], PDO::PARAM_INT);
                $req->execute();
                $tailles = $req->fetchAll();
            }



?>

            <div class="affichage-maillot-unique">
                <img src="./assets/images/<?= $produit["image"] ?>" alt="<?= ucfirst($produit['categorie']) ?> <?= $produit['type_maillot'] ?> <?= $produit['club'] ?>">

                <div class="affichage-information-maillot-unique">

                    <form action="" method="get">
                        <h2><?= ucfirst($produit['categorie']) ?> <?= $produit['club'] ?> <?= $produit['type_maillot'] ?></h2>
                        <div class="produit_info-section">
                            <p class="information-maillot-prix"><?= $produit["prix"] / 100 ?>€</p>
                            <p>Championnat : <?= $produit["championnat"] ?></p>
                            <p>Equipementier : <?= $produit['equipementier'] ?></p>
                            <p>Saison : <?= $produit['saison'] ?></p>
                            <p>Couleur : <?= $produit['couleur'] ?></p>
                            <div>
                                <input type="hidden" name="page" value="ajouterpanier">
                                <input type="hidden" name="id" value="<?= $produit['Id_produits'] ?>">
                                <select name="taille" id="taille">
                                    <?php foreach ($tailles as $taille) : ?>
                                        <?php if ($taille['quantite'] !== 0) : ?>
                                            <option name="taille" value="<?= $taille['Id_taille'] ?>"><?= $taille['libeller'] ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <button id="submit" name="submit" type="submit" value="submit">Ajouter au pannier</button>
                        </div>
                    </form>
                </div>
            </div>
<?php





        } else {
            echo "<h1>L ID n'existe pas dans la base de données</h1>";
        }
    } else {
        echo "<h1>erreur</h1>";
    }
}
?>





<style>
    .affichage-maillot-unique {
        margin: 50px 0;
        display: flex;
        flex-direction: row;
        justify-content: center;
        height: 70vh;
        width: 100%;
    }

    .affichage-maillot-unique img {
        height: 600px;
    }

    .affichage-information-maillot-unique {
        padding: 20px;
        height: 550px;
        width: 450px;
        display: flex;
        flex-direction: column;
        margin-top: 30px;
        border-radius: 50px;
        border: 5px #1ABC9c solid;
        text-align: center;

    }

    .information-maillot-prix {
        font-size: 36px;
        font-weight: bold;
    }

    .affichage-information-maillot-unique select {
        padding: 20px 0px;
        margin: 10px 0px;
        min-width: 250px;

        border: none;

    }

    .affichage-information-maillot-unique option {
        padding: 10px 20px;

    }

    .affichage-information-maillot-unique button {
        padding: 20px 0px;
        border: none;
        cursor: pointer;
        min-width: 250px;
        background-color: #1ABC9c;
        border-radius: 50px;
        color: white;


    }

    @media screen and (max-width: 768px) {
        .affichage-maillot-unique {
            margin: 50px 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }

        .affichage-maillot-unique img {
            height: 400px;
        }

    }
</style>