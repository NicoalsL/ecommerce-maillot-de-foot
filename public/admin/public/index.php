<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../admin/public/assets/style/style.css" rel="stylesheet">
    <title><?= $title ?? 'Administrateur' ?></title>
</head>

<style>
    .vert{
        background-color: #1ABC9c !important;
        color: white !important;
    }
</style>
<body>
    
    
    <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 1){?>

<button class="btn btn-primary m-5 vert" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Menu</button>
<?php }?>
<div class="offcanvas offcanvas-start vert " data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header ">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">  
        <img src="../../../public/assets/images/logo fcfcblanc2.png" alt="Logo"  width="50px" height="" class="d-inline-block align-text-center m-2">
    Culture Foot
    </h5>
    <button type="button" class="btn-close " data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
<ul class="navbar-nav ">
  <li class="nav-item">
      
      <a class="nav-link" href="?page=vue_user">User</a>
      
  </li>
  <li class="nav-item">
      <a class="nav-link" href="?page=vue_article">Article</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="?page=vue_stock">Stock</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="?page=vue_club">Club</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="?page=vue_categorie">Categorie</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="?page=vue_equipementier">Equipementier</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="?page=vue_saison">Saison</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="?page=vue_championnat">Championnat</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="?page=vue_taille">Taille</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="?page=vue_deconnection">Déconnection</a>
  </li>
</div>
  </div>





<script src="https://kit.fontawesome.com/ab09c2f170.js" crossorigin="anonymous"></script>

    <?php require '../../../model/connexion_bdd.php'; ?>
    <?php require '../../admin/model/fonctions.php'; ?>
    <?php require '../../admin/controller/traitement_router.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
