<?php
$quantiter = 1;
$totale = 0;



if(isset($_GET['action']) && $_GET['action'] == 'supp') {
    $action = htmlspecialchars($_GET['action']);
    $id = (int) $_GET['id'];

    $req = $pdo -> prepare('DELETE commande 
                            FROM commande 
                            INNER JOIN `panier` ON commande.Id_panier = panier.Id_panier
                            WHERE commande.Id_produit_fini = :Id_produit_fini
                            AND panier.Id_users = :Id_users
                            ');

    $req -> bindValue('Id_produit_fini', $id, PDO::PARAM_INT);
    $req -> bindValue('Id_users', $_SESSION['id'], PDO::PARAM_INT);
    $req -> execute();
    

}



if(isset($_SESSION['user'])) {
    $req = $pdo->prepare('SELECT * FROM panier
                            INNER JOIN `commande`, `produit_fini`, `produits`, `club`, `categorie`, `type_maillot`, `tarification`, `taille`, `unite_valeur`, `stocker`, `championnat`, `users`
                            WHERE users.Id_users = :Id_users
                            AND users.Id_users = panier.Id_users
                            AND commande.Id_panier = panier.Id_panier
                            AND produit_fini.Id_produit_fini = commande.Id_produit_fini
                            AND produit_fini.Id_produits = produits.Id_produits
                            AND produits.Id_club = club.Id_club
                            AND produits.Id_categorie = categorie.Id_categorie
                            AND produits.Id_type_maillot = type_maillot.Id_type_maillot
                            AND produits.Id_produits = tarification.Id_produits
                            AND unite_valeur.Id_categorie = categorie.Id_categorie
                            AND unite_valeur.Id_taille = taille.Id_taille
                            AND taille.Id_taille = stocker.Id_taille
                            AND stocker.Id_taille = produit_fini.Id_taille
                            AND stocker.Id_produit_fini = produit_fini.Id_produit_fini
                            AND championnat.Id_championnat = produits.Id_championnat
');
    $req -> bindValue('Id_users', $_SESSION['id'], PDO::PARAM_INT);
    $req -> execute();
    $paniers = $req -> fetchAll();


    ?>




<div class="container text-center">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"><p>Article</p></th>
      <th scope="col"><p>Taille</p></th>
      <th scope="col"><p>Image</p></th>
      <th scope="col"><p>Quantiter</p></th>
      <th scope="col"><p>Prix</p></th>
      <th scope="col"><p>Retirer</p></th>
    </tr>
  </thead>

  <tbody>
        <?php foreach ($paniers as $panier): ?>
    <tr>
    <td><?= ucfirst($panier["categorie"]) ?> <?= $panier["type_maillot"] ?> <?= $panier["club"] ?></td>
    <td><?= $panier["libeller"] ?></td>

    <td><img src="./assets/images/<?= $panier["image"] ?>" width="100px"></td>
            <td>                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" type="button" id="moins">-</button>
                    </div>
                    <input type="text" class="form-control text-center" id="stock" value="<?= $quantiter ?>">
                    <div class="input-group-append">
                        <a href="?page=vue_page_panier&action=add&id=<?= $panier['Id_produit_fini']?>" class="btn btn-outline-secondary " type="button" id="plus">+</a>
                    </div>
                </div>
            </td>
            <td><?= $panier["prix"]/100 ?>€</td>
            <td><a href="?page=vue_page_panier&action=supp&id=<?= $panier['Id_produit_fini']?>" class="btn btn-danger">Retirer</a></td>


    </tr>

    <?php endforeach ?>
    <tr>
    <th scope="col">Totale :</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">
            <?php foreach ($paniers as $panier): ?>
                <p><?php $totale = $totale +$panier["prix"]?></p>
                <?php endforeach ?>

                <p><?= $totale/100 ?>€</p>

        </th>
            <th scope="col"></th>
    </tr>

  </tbody>
</table>
</div>


<?php }?>