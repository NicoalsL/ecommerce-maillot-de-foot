<?php 
if(isset($_GET['id'])){
    if (!empty($_GET['id']) or is_numeric($_GET['id'])) {
        $id = (int)$_GET['id'];
        $req = $pdo->prepare('SELECT * FROM club 
                                INNER JOIN `produits`, `type_maillot`, `affiliation`, `tarification`,`equipementier`
                                WHERE club.Id_club = :id
                                AND club.Id_club = affiliation.Id_club
                                AND produits.Id_type_maillot = type_maillot.Id_type_maillot
                                AND produits.Id_club = club.Id_club
                                AND tarification.Id_produits = produits.Id_produits
                                AND affiliation.Id_equipementier = affiliation.Id_equipementier
                                AND equipementier.Id_equipementier = affiliation.Id_equipementier
        ');
        $req -> bindValue(':id', $id);
        $req -> execute();
        $maillots = $req->fetchAll();
    }
}

?>

<section>
<div class="contenaire_articles">

        <?php foreach ( $maillots as $maillot ) : ?>
            <a href="?page=vue_page_article_indiv&id=<?= $maillot["Id_produits"] ?>">
                <div class="card-maillot">
                    <div class="card-image">
                        <img src="./assets/images/<?= $maillot["image"] ?>">
                    </div>
                    <div class="card-content">
                        <h3 class="produit-name">Maillot <?= $maillot["club"] ?></h3>
                        <p class="produit-type"><?= $maillot["type_maillot"] ?></p>
                        <p class="produit-prix"><?= $maillot["prix"] / 100 ?>€</p>
                    </div>
                </div></a>
                <?php endforeach ?>
            </div>
        </section>
