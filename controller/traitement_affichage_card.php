<?php

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $pdo->query('SELECT * FROM `maillot`


');
$maillots = $query->fetchAll();
?>
<div class="contenaire--card">
    <?php foreach ($maillots as $maillot ) : ?>
        <a href="?page=vue_page_article_indiv&id=<?= $maillot["Id_maillot"]  ?>">
        <div class="card">
            <div class="card--ilustration">
                <img src="./assets/images/maillot_om_d.jpg">
            </div>
            <div class="text">
                
                <h4>Maillot <?= $maillot["Id_maillot"] ?></h4>
                <p><?= $maillot["type_maillot"] ?></p>
                <p><?= $maillot["prix"] / 100 ?>€</p>
            </div>
        </div></a>
    <?php endforeach ?>
</div>