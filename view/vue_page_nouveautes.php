<?php require '../controller/traitement_affichage_nouveauter.php'; ?>

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