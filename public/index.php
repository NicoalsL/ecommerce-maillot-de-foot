<?php session_start(); ?>
<?php
// if (extension_loaded('openssl')) {
//     echo "L'extension OpenSSL est chargée.";
// } else {
//     echo "L'extension OpenSSL n'est pas chargée.";
// }
?>

<?php if(!isset($_SESSION['panier'])){$_SESSION['panier'] = []; };?>
<?php require '../model/connexion_bdd.php'; ?>
<?php require '../model/fonctions.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/style/style.css"  rel="stylesheet">
    <style src></style>
    <title>MonMaillot</title>
</head>
<body>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<!-- Stimulus.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/stimulus/dist/stimulus.umd.min.js"></script>

    <?php require_once '../view/vue_bandeau.php'; ?>
    <?php require_once '../view/vue_barnav.php'; ?>
        <?php require '../controller/traitement_router.php';?>
    <?php require '../view/vue_flooter.php';?>
    <script src="https://kit.fontawesome.com/ab09c2f170.js" crossorigin="anonymous"></script>

    <script src = "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js" ></script> 
    <script src="stimulus.min.js" type="module"></script>
    <script src="scripte.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
