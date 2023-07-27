<?php 
    if(isset($_GET['page'], $_SESSION['role']) && $_GET['page'] != NULL && $_SESSION['role'] === 1 ) { 
        $page = htmlentities($_GET['page'] , ENT_QUOTES, 'UTF-8');
        switch ($page) {
            case 'vue_user':
                require '../view/vue_gestion_user.php';
                break;
            case 'vue_article':
                require '../view/vue_gestion_article.php';
                break;
            case 'vue_club':
                require '../view/vue_gestion_club.php';
                break;
            case 'vue_equipementier':
                require '../view/vue_equipementier.php';
                break;
            case 'vue_categorie':
                require '../view/vue_categorie.php';
                break;
            case 'vue_saison':
                require '../view/vue_gestion_saison.php';
                break;
            case 'vue_championnat':
                require '../view/vue_gestion_championnat.php';
                break;
            case 'vue_taille':
                require '../view/vue_taille.php';
                break;
            case 'vue_stock':
                require '../view/vue_gestion_stock.php';
                break;
            case 'gestion_stock_article':
                require '../view/vue_stock_article.php';
                break;
            case 'modification_championnat':
                require '../view/vue_modification_championnat.php';
                break;
            case 'suppression_championnat':
                require '../view/vue_suppression_championnat.php';
                break;
            case 'modification_saison':
                require '../view/vue_modification_saison.php';
                break;
            case 'modification_article':
                require '../view/vue_modifier_article.php';
                break;
            case 'vue_deconnection':
                require '../view/vue_deconnection.php';
                break;
            default:
            require '../view/vue_gestion_article.php';
                break;
                
        }
    } else {
        require '../view/vue_connection.php';
    }
