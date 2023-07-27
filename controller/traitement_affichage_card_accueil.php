<?php

$req = $pdo->prepare('SELECT * FROM `club`
                                ORDER BY RAND()
                                LIMIT 5
');
$req-> execute();
$clubs = $req->fetchAll();

?>
<style>
    .containaire-article-card{
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        padding: 60px 0;
        margin: 25px 0; 
        
        
    }
    .article-card{
        max-width: 300px;
        max-height: 300px;
        margin: 20px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
        border-radius: 5px;
        overflow: hidden;
        position: relative;
        transition: transform 0.3s ease-in-out;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .article-card img {
        max-width: 100%;
        max-height: 100%;
        height: auto;
    }
    .article-card a {
        color: #1ABC9c;
    }

    .article-info{
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 20px;
        background-color: rgba(0,0,0,0.7);
        color: #fff;
        transform: translateY(100%);
        transition: transform 0.4s ease-in-out;
    }
    .article-card:hover{
        transform: scale(1.1);
    }
    .article-card:hover:hover .article-info{
        transform: translateY(0);
    }
    @media screen and (max-width: 768px) {

  .containaire-article-card{
    display: flex;
    flex-direction: row;
    overflow-y: auto;
  
  }
}
</style>



<div class="containaire-article-card ">
    
    <?php foreach ($clubs as $club ) : ?>
            <div class="article-card">
                <img src="../public/assets/images/<?= $club["logo"]?>" alt="logo <?= $club["club"] ?>">
                <div class="article-info">
                    <h3><?= $club["club"] ?></h3>

                    <a href="?page=vue_page_club&id=<?= $club["Id_club"] ?>">Voir article</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>