<?php
if (isset($_GET['page']) && $_GET['page'] != NULL ) {
    $page = htmlspecialchars($_GET['page']);

    switch ($page) {
        case 'vue_accueil':
            require '../view/vue_accueil.php';
            break;
        case 'vue_page_choix':
            require '../view/vue_page_nouveautes.php';
            break;
        case 'vue_page_article':
            require '../view/vue_page_article.php';
            break;
        case 'vue_page_article_indiv':
            require '../view/vue_page_article_indiv.php';
            break;
        case 'vue_page_maillots':
            require '../view/vue_page_maillots.php';
            break;
        case 'vue_identifiant':
            require '../view/vue_identifiant.php';
            break;
        case 'vue_connexion':
            require '../view/vue_connexion.php';
            break;
        case 'vue_inscription':
            require '../view/vue_inscription.php';
            break;
        case 'vue_produits':
            require '../view/vue_produits.php';
            break;
        case 'vue_page_club':
            require '../view/vue_page_club.php';
            break;
        case 'vue_page_panier':
            require '../view/vue_panier.php';
            break;
        case 'ajouterpanier':
            require '../view/vue_ajoutpanier.php';
            break;
        case 'vue_deconnection':
            require '../view/vue_deconnection.php';
            break;
        case 'vue_page_short':
            require '../view/vue_page_short.php';
            break;
        default:
            require '../view/vue_accueil.php';
            break;
    }
} else {
    require '../view/vue_accueil.php';
}
?>
