
<nav class="navbar navbar-expand-lg bg-body-tertiary color">
    <div class="container-fluid">
    <a class="navbar-brand white" href="?page=vue_accueil">
        <img src="../public/assets/images/logo fcfcblanc2.png" alt="Logo"  width="50px" height="" class="d-inline-block align-text-center m-2">
    Culture Foot
    </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

            <ul class="navbar-nav ">
            <li class="nav-item">
                    <a class="nav-link white" href="?page=vue_produits">Produits</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link white" href="?page=vue_page_maillots">Maillots</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link white" href="?page=vue_page_short">Short</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link white" href="?page=vue_page_choix">Nouveautés</a>
                </li>



            </ul>
        </div>

        <div class="collapse navbar-collapse justify-content-end m-2" id="navbarNav">

            <ul class="navbar-nav justify-content-end">


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Votre Profil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <?php if (isset($_SESSION['user'])) {
                            $requete = $pdo->prepare('SELECT * FROM panier 
                                                        INNER JOIN `commande`, `produit_fini`
                                                        WHERE panier.Id_users = :Id_users
                                                        AND commande.Id_panier = panier.Id_panier
                                                        AND commande.Id_produit_fini = produit_fini.Id_produit_fini
                                                        ');
                            $requete->bindValue('Id_users', $_SESSION['id']);
                            $requete->execute();
                            $panier = $requete->fetchAll(); ?>
                            
                            <li class="nav-item">
                                <a class="dropdown-item " href="?page=vue_deconnection">Déconnection</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="dropdown-item " href="?page=vue_identifiant">S'identifier</a>
                            </li>
                        <?php } ?>
                    </ul>

                </li>
                <li class="nav-item">
                    <a class="nav-link white" href="?page=vue_page_panier">Panier
                            <?php if (isset($_SESSION['id']) && count($panier) !== 0) { ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= count($panier);?>
                                <span class="visually-hidden">unread messages</span>
                            </span>
                                <?php } ?>
                            </a>
                </li>
                <li class="nav-item">
                </li>

            </ul>
        </div>

    </div>
</nav>


<style>
    .color {
        background-color: #2C3E50;
        color: #fff;
        padding: 20px;
    }

    .white {
        color: #fff !important;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'open sans', sans-serif;
        font-size: 16px;
        line-height: 1.5;
        color: #444;
        background-color: #fff;
    }

    a {
        color: #333;
        text-decoration: none;
    }

    header {
        background-color: #2C3E50;
        color: #fff;
        padding: 20px;
    }

    header a h1 {
        color: #fff;
        font-size: 40px;
        margin-bottom: 10px;
        text-align: center;
    }

    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;

    }

    nav li {
        display: inline-block;
        position: relative;
    }

    nav a {
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
        padding: 10px;
    }

    nav li a {
        display: block;
        padding: 10px 20px;
        color: #fff;
        text-decoration: none;
    }

    nav li:hover>ul {
        display: block;
    }

    nav ul ul {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #2C3E50;
        color: #2C3E50;
        border-radius: 4px;
    }

    nav ul ul li {
        display: block;
        width: 200px;
    }

    nav ul ul li a {
        display: block;
    }

    nav a::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #1ABC9c;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.6s ease-out;
    }

    nav a:hover::before {
        transform: scaleX(1);
    }

    .ligne-nav {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .co a {
        color: #fff;
        padding: 10px;
    }

    .co a:hover {
        color: #1ABC9c;
        padding: 10px;
    }

    .rouge {
        color: crimson !important;
    }

    .icone span ul li {
        display: inline-block;
        position: relative;

    }

    .icone span li a {
        display: block;
        padding: 0px 10px;
        color: #fff;
        text-decoration: none;

    }

    .icone span li:hover>ul {
        display: block;
    }

    .icone span ul ul {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #2C3E50;
        color: #fff;
        border-radius: 4px;
    }

    .icone span ul ul li {
        display: block;
        width: 350px;
    }

    .icone span ul ul li a {
        display: block;
    }

    nav ul ul li a {
        display: block;
    }

    .icone span a::before {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #1ABC9c;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.6s ease-out;
    }
</style>
