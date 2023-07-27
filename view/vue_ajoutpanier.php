<?php

if (isset($_GET['submit'], $_SESSION['id'])) {
  $_SESSION['panier'] = [];
  // var_dump($_GET);
  // var_dump($_POST);
  // var_dump($_SESSION);


  if (isset($_GET['id'], $_GET['taille'])) {
    $idProduit = (int)$_GET['id'];
    $idTaille = (int)$_GET['taille'];
    // var_dump($idProduit);

    // chercher le produit
    $req = $pdo->prepare('SELECT * FROM `produit_fini` , `produits`, `club`, `categorie`, `type_maillot`, `stocker`, `taille`
                        WHERE produit_fini.Id_produits = :Id_produits
                        AND produit_fini.Id_taille = :Id_taille
                        AND produit_fini.Id_produits = produits.Id_produits
                        AND produits.Id_club = club.Id_club
                        AND produits.Id_categorie = categorie.Id_categorie
                        AND produits.Id_type_maillot = type_maillot.Id_type_maillot
                        AND stocker.Id_taille = produit_fini.Id_taille 
                        AND taille.Id_taille = stocker.Id_taille 
                        AND produit_fini.Id_produit_fini = stocker.Id_produit_fini
');
    $req->bindValue(':Id_produits', $idProduit, PDO::PARAM_INT);
    $req->bindValue(':Id_taille', $idTaille, PDO::PARAM_INT);
    $req->execute();
    $produit = $req->fetch();
    //  var_dump($produit);


    /// chercher l'user
    $req = $pdo->prepare('SELECT Id_users FROM users WHERE Id_users = :Id_users');
    $req->bindValue('Id_users', $_SESSION['id'], PDO::PARAM_INT);
    $req->execute();
    $user = $req->fetch();
    // var_dump($user);


    // verifier que l'user n'a pas deja de panier 
    $request = $pdo->prepare('SELECT * FROM panier WHERE Id_users = :Id_users');
    $request->bindValue('Id_users', $user['Id_users'], PDO::PARAM_INT);
    $request->execute();
    $countUser = $request->fetchColumn();


    // ajouter un panier 
    if ($countUser === false) {
      // pas de panier

      //cree le panier
      $insert = $pdo->prepare('INSERT INTO panier(Id_users) VALUES (:Id_users)');
      $insert->bindValue('Id_users', $user['Id_users'], PDO::PARAM_INT);
      $insert->execute();

      //recuperer le panier
      $req = $pdo->prepare('SELECT * FROM panier WHERE Id_users = :Id_users');
      $req->bindValue('Id_users', $user['Id_users'], PDO::PARAM_INT);
      $req->execute();
      $panier = $req->fetch();
      echo 'nouveau panier';
    } else {
      // a deja un panier

      //recuperer le pannier
      $req = $pdo->prepare('SELECT * FROM panier WHERE Id_users = :Id_users');
      $req->bindValue('Id_users', $user['Id_users'], PDO::PARAM_INT);
      $req->execute();
      $panier = $req->fetch();
      echo 'a deja un panier';
    }




    // gerer la commander 
    $insert = $pdo->prepare('INSERT INTO commande(Id_produit_fini, Id_panier, quantiter) VALUES (:Id_produit_fini, :Id_panier, :quantiter)');
    $insert->bindValue('Id_produit_fini', $produit['Id_produit_fini'], PDO::PARAM_INT);
    $insert->bindValue('Id_panier', $panier['Id_panier'], PDO::PARAM_INT);
    $insert->bindValue('quantiter',  1, PDO::PARAM_INT);
    $insert->execute();
  }
?>



<div class="container text-center centre">
  <div class="card m-4 " style="width: 19rem;" >
    <img class="card-img-top" src="./assets/images/<?= $produit["image"] ?>" alt="Image de l'article">
    <div class="card-body text-center">
      <h5 class="card-title"><?= ucfirst($produit["categorie"]) ?> <?= $produit["type_maillot"] ?> <?= $produit["club"] ?></h5>
      <h5 class="card-title"><?= $produit["libeller"] ?></h5>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <button class="btn btn-outline-secondary" type="button" id="moins">-</button>
        </div>
        <input type="text" class="form-control text-center" id="stock" value="1">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary " type="button" id="plus">+</button>
        </div>
      </div>
      <button type="button" class="btn btn-primary ">Valider</button>
    </div>
  </div>
  </div>
<?php } else {
  echo 'connectez vous !';
}
?>
<style>
  .centre{

    display: flex;
    justify-content: center;
  }
</style>