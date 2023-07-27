<?php 
if(isset($_POST['submit'])){

    if(isset($_FILES['logo']) && isset($_POST['club'])&& isset($_POST['equipementier']) ){

        $idEquipementier = htmlspecialchars($_POST['equipementier'], ENT_QUOTES | ENT_HTML5 | ENT_DISALLOWED, 'UTF-8');
        $logo = $_FILES['logo'];
        $club = htmlspecialchars($_POST['club'], ENT_QUOTES | ENT_HTML5 | ENT_DISALLOWED, 'UTF-8');

        $extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        $nomFichier = '_'.$club.'.'.$extension;
        $dossierSite = '../../assets/images/'.$nomFichier;

        if(move_uploaded_file($_FILES['logo']['tmp_name'], $dossierSite)){
            echo "Fichier téléchargé avec succès.";
        } else {
            echo "Erreur lors du téléchargement du fichier.";
        }
    

        $insert = $pdo ->prepare('INSERT INTO club( club, logo) VALUES (:club, :logo)');
        $insert -> execute([
            'club' => $club,
            'logo' => $nomFichier
        ]);

        $insertAffiliation = $pdo ->prepare('INSERT INTO affiliation(Id_club, Id_equipementier) VALUES (:Id_club, :Id_equipementier)');
        $insertAffiliation -> execute([
            'Id_club' => $pdo->lastInsertId(),
            'Id_equipementier' => $idEquipementier
        ]);
        echo 'reussi';
        var_dump($insert);
        var_dump($insertAffiliation);
    }
}

$req= $pdo->prepare('SELECT * FROM equipementier');
$req -> execute();
$equipementiers = $req->fetchAll();

$req= $pdo->prepare('SELECT * FROM affiliation
                        INNER JOIN `equipementier`, `club`
                        WHERE club.Id_club = affiliation.Id_club
                        AND equipementier.Id_equipementier = affiliation.Id_equipementier
                    ');
$req -> execute();
$clubs = $req->fetchAll();
?>
<h1>Club</h1>

<div class="container text-center">

        <form method="POST" enctype="multipart/form-data">
            
            <p>Club</p>
            <input class="form-control" name="club"type="text" placeholder="Club" required="required">
            <p>Logo</p>
            <input class="form-control" name="logo"type="file" placeholder="Logo" required="required">
            <br>
            <br>
            <select class="form-select" name="equipementier" id="equipementier">
            <?php foreach ($equipementiers as $equipementier): ?>
                <option value="<?=$equipementier['Id_equipementier']?>"><?=$equipementier['equipementier']?></option>
                <?php endforeach ?>
            </select>
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
      <th scope="col">club</th>
      <th scope="col">logo</th>
      <th scope="col">equipementier</th>
    </tr>
  </thead>

  <tbody>
        <?php foreach ($clubs as $club): ?>

    <tr>
    <th scope="row"><?=$club['Id_club']?></th>
    <td><?=$club['club']?></td>
    <td><img src="../../assets/images/<?=$club['logo']?>" width="50px"></td>
            <td><?=$club['equipementier']?></td>
    </tr>

    <?php endforeach ?>

  </tbody>
</table>
</div>

<div class="col-2">
    </div>
</div>
</div>