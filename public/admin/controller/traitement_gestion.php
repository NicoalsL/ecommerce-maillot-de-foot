<?php
include "../../../model/connexion_bdd.php";

$query = $pdo->query('SELECT * FROM `maillots` 
                        inner JOIN `club` , `equipementier` 
                        WHERE club.id_club = maillots.id_club 
                        AND equipementier.id_equipementier = maillots.id_equipementier
                        ORDER BY `maillots`.`id_maillots` ASC');
$maillots = $query->fetchAll();
var_dump($maillots);
?>
<style>
    body{
        margin: 0;
    }
    table {
        background-color: black;
    }
    .btn_modif{
        height: 30px;
        border: none;
        border-radius: 20px;
        background-color: greenyellow;
        color: white; 
        padding: 0 15px;
        cursor: pointer;
        }
    .btn_modif:hover{
        background-color: green;
    }
    .btn-supp {
        height: 30px;
        border: none;
        border-radius: 20px;
        background-color: red;
        color: white;
        padding: 0 15px;
        cursor: pointer;

    }
    .btn-supp:hover{
        background-color: crimson;
    }

    th {
        background-color: white;
        border: 1px solid black;
        min-width: 100px;
    }
    
</style>
<table>
    <tr>
        <th>
            Id
        </th>
        <th>
            Nom equipe 
        </th>
        <th>
            Type mailot
        </th>
        <th>
            Equipementier
        </th>
        <th>
            Prix
        </th>
        <th>
            Image maillot
        </th>
        <th>
            Modifier
        </th>
        <th>
            Supprimer
        </th>
    </tr>
    <?php foreach ($maillots as $maillot) : ?>
        <tr>
            <th>
                <p><?= $maillot['id_maillots'] ?></p>
            </th>
            <th>
                <p><?= $maillot['nom_club'] ?></p>
            </th>
            <th>
                <p><?= $maillot['type_maillot'] ?></p>
            </th>
            <th>
                <p><?= $maillot['nom_equipementier'] ?></p>
            </th>
            <th>
                <p><?= $maillot['prix'] / 100. ?>€</p>
            </th>
            <th>
                <img src="../../../public/assets/images/<?= $maillot['image'] ?>.jpg" height="150px">
            </th>
            <th>
                <button class="btn_modif">Modifier</button>
            </th>
            <th>
                <button class="btn-supp">Supprimer</button>
            </th>
        </tr>

    <?php endforeach ?>
</table>