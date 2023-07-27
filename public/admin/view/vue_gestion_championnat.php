<?php
if(isset($_GET['id'])) {
    $idChampionnat = (int)$_GET['id'];
    $req = $pdo -> prepare('DELETE FROM championnat WHERE Id_championnat = :Id_championnat ');
    $req -> bindValue('Id_championnat', $idChampionnat, PDO::PARAM_INT);
    $req -> execute();
}

if(isset($_POST['submit'])){
    if(isset($_POST['championnat']) && isset($_FILES['logo_championnat'])){

    $championnat = htmlspecialchars($_POST['championnat'], ENT_QUOTES | ENT_HTML5 | ENT_DISALLOWED, 'UTF-8');
    $logochampionnat = $_FILES['logo_championnat'];

    $extension = pathinfo($_FILES['logo_championnat']['name'], PATHINFO_EXTENSION);
    $nomFichier = '_'.$championnat.'.'.$extension ;
    $dossierSite = '../../assets/images/'.$nomFichier;
    
    if(move_uploaded_file($_FILES['logo_championnat']['tmp_name'], $dossierSite)){
        echo "Fichier téléchargé avec succès.";
    } else {
        echo "Erreur lors du téléchargement du fichier.";
    }



    $insert = $pdo ->prepare('INSERT INTO championnat(championnat, logo_championnat) VALUES (:championnat, :logo_championnat)');
    $insert -> execute([
        'championnat' => $championnat,
        'logo_championnat' => $nomFichier
    ]);
    }
}


$req= $pdo->prepare('SELECT * FROM championnat');
$req -> execute();
$championnats = $req->fetchAll();
?>



<div class="container text-center">

<h1>championnat</h1>
<form action="" method="POST" enctype="multipart/form-data">
        <p>Championnat</p>
        <input class="form-control"  name="championnat"type="text" placeholder="championnat" required="required">
        <br>
        <input class="form-control" name="logo_championnat" type="file" placeholder="Logo" required="required">
        <br>
        <button class="btn btn-primary" type="submit" id="submit" name="submit" value="submit">Valider</button>
    </form>





        <div class="row align-items-start">
        <div class="col-2">
    </div>
    
    <div class="col-8">
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">categorie</th>
                    <th scope="col">libeller</th>
                    <th scope="col">modifier</th>
                    <th scope="col">supprimer</th>
                </tr>
            </thead>

  <tbody>
      <?php foreach ($championnats as $championnat): ?>
        
        <tr>
            <th scope="row"><?=$championnat['Id_championnat']?></th>
            <td><?=$championnat['championnat']?></td>
            <td><img src="../../assets/images/<?=$championnat['logo_championnat']?>" width="50px"></td>
            <td><a href="?page=modification_championnat&id=<?=$championnat['Id_championnat'] ?>"><i class="fa-solid fa-pen-to-square" style="color: #1ABC9c;"></i></a></td>
            <td><a  href="?page=vue_championnat&id=<?=$championnat['Id_championnat'] ?>" onclick="return(confirm('Voulez vous supprimer le championnat <?=$championnat['championnat']?> ?'))"><i class="fa-solid fa-delete-left" style="color: #1ABC9c;"></i></a></td>
        </tr>
        
        <?php endforeach ?>
        
    </tbody>
</table>
</div>

<div class="col-2">
    </div>
</div>




</div>
