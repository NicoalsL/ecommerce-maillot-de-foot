    <div class="affichageImage">
        <h1 class="title">Nouvelle collection de maillots de foot 2023</h1>
        
        <a class="boutonAction" id="btnaction" href="?page=vue_page_choix">Découvrir la collection</a>
    </div>



<div class="container">
    <div class="textt">Texte à faire apparaître</div>
</div>



    <?php require '../controller/traitement_affichage_card_accueil.php'; ?>

    <?php require '../controller/traitement_affichage_card_equipementier.php'; ?>
    <?php require '../controller/traitement_afficahge_card_championnat.php'; ?>



<style>
.container {
  width: 100%;
  height: 400px;
  overflow: hidden;
}

.text {
  position: relative;
  left: -100%;
  opacity: 0;
}

        .promo h2 {
            font-size: 32px;
            text-align: center;
            margin-bottom: 10px;
        }

        .promo {
            padding: 10px 0;
            background-color: #1ABC9c;
            color: #fff;
        }

        .promo p {
            font-size: 18;
            text-align: center;
            margin-bottom: 20px;
        }

        .promo a {
            display: block;
            margin: 0 auto;
            max-width: 200px;
            background-color: #fff;
            border: 2px solid #fff;
            color: #1ABC9c;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            padding: 10px 20px;
            border-radius: 50px;
            transition: all 0.2sec ease-in-out;
        }

        .promo a:hover {
            background-color: #1ABC9c;
            border: 2px solid #fff;
            color: #fff;
        }

        .affiche {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .affiche h2 span {
            color: #1ABC9c;
        }

        .affichageImage {
            height: 800px;
            width: 100%;
            background-image: url("../public/assets/images/maillot-real-madrid-2021-2022-domicile-adidas-footpack-9.jpg");
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            z-index: -1;
            filter: brightness(90%);
        }



        /* .affichageImage a {
            color: white;
            background-color: #1ABC9c;
            border: none;
            text-align: center;
            border-radius: 50px;
            min-width: 200px;
            font-size: 25px;
            padding: 10px 20px;
            margin: 30px;
            background-color: rgba(26, 188, 156, 1);
            cursor: pointer;
            border: 3px solid rgba(26, 188, 156, 0.7);
            box-shadow: 1px 1px 5px gray;
            animation: apparition 1s ease-in-out forwards;

        }

        .affichageImage a:hover {
            border: 3px solid rgba(26, 188, 156, 0.7);
            background-color: rgba(0, 0, 0, 0.1);
            color: #1ABC9c;
        } */


.boutonAction{
    background-color: #1ABC9C;
  color: #FFFFFF !important;
  border-radius: 5px;
  font-size: 18px;
  font-weight: bold;
  padding: 10px 20px;
  text-decoration: none;
  transition: all 0.3s ease;
}

.boutonAction:hover {
    background-color: #148F77;
  cursor: pointer;
  /* transform: translateY(-2px); */
  box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.title {
color: #fff;
text-shadow: 1px 1px 5px gray;
animation: apparition 1s ease-in-out forwards;
font-size: 36px;
font-weight: bold;
text-align: center;
margin-top: 50px;
margin-bottom: 30px;
transition: all 0.3s ease;
}

@media screen and (max-width: 768px) {
  .affichageImage {
    height: 400px;
  }

  .title {
    font-size: 24px;
  }

  .boutonAction {
    font-size: 16px;
  }
  .containaire-article-card{
    display: flex;
    overflow: auto;
    flex-direction: row;
  
  }
}
    </style>