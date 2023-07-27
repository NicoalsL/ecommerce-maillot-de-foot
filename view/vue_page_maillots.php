<?php require '../controller/traitement_affichage_maillots.php'; ?>
<div class="container text-center">
<div class="row align-items-start">

<div class="col-12 d-flex p-3">
<h1>Maillot de football</h1>
</div>

</div>
</div>


<div class="contenaire_articles">
    <?php foreach ( $maillots as $maillot ) : ?>
        <a class="bouton-affichage" href="?page=vue_page_article_indiv&id=<?= $maillot["Id_produits"] ?>">
        <div class="card-maillot">
            <div class="card-image">
                <img src="./assets/images/<?= $maillot["image"]?>">
            </div>
            <div class="card-content">
                <h3 class="produit-name"><?= ucfirst($maillot["categorie"]) ?> <?= $maillot["club"] ?></h3>
                <p class="produit-type"><?= $maillot["type_maillot"] ?></p>
                <p class="produit-prix"><?= $maillot["prix"] / 100 ?>€</p>
            </div>
        </div></a>

    <?php endforeach ?>
</div>

<style>
    .bouton-affichage{
        text-decoration: none;
    }
</style>
