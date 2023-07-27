<?php
if(isset($_POST['submit'])){
    if(isset($_POST['equipementier'], $_FILES['logo_equipementier'])){

    $equipementier = htmlspecialchars($_POST['equipementier'], ENT_QUOTES | ENT_HTML5 | ENT_DISALLOWED, 'UTF-8');
    $logoEquipementier = $_FILES['logo_equipementier'];

    $extension = pathinfo($_FILES['logo_equipementier']['name'], PATHINFO_EXTENSION);
    $nomFichier = '_'.$equipementier.'.'.$extension ;
    $dossierSite = '../../assets/images/'.$nomFichier;
    
    if(move_uploaded_file($_FILES['logo_equipementier']['tmp_name'], $dossierSite)){
        echo "Fichier téléchargé avec succès.";
    } else {
        echo "Erreur lors du téléchargement du fichier.";
    }




    $insert = $pdo ->prepare('INSERT INTO equipementier(equipementier, logo_equipementier) VALUES (:equipementier, :logo_equipementier)');
    $insert -> execute([
        'equipementier' => $equipementier,
        'logo_equipementier' => $nomFichier
    ]);
    }
}


$req= $pdo->prepare('SELECT * FROM equipementier');
$req -> execute();
$equipementiers = $req->fetchAll();
?>










<div class="container text-center">
<div class="row align-items-start">
<div class="col-2">
</div>
<div class="col-8">
  <h1>Equipementier</h1>
</div>
<div class="col-2">
</div>

</div>

<form method="POST" enctype="multipart/form-data">
        <p>Equipementier</p>
        <input class="form-control" name="equipementier"type="text" placeholder="Equipementier" required="required">
<br>
<input class="form-control" name="logo_equipementier" type="file" placeholder="Logo" required="required">
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
      <th scope="col">equipementier</th>
      <th scope="col">image</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
        <?php foreach ($equipementiers as $equipementier): ?>
    <tr>
    <th scope="row"><?=$equipementier['Id_equipementier']?></th>
    <td ><?=$equipementier['equipementier']?></td>
    <td><img src="../../assets/images/<?=$equipementier['logo_equipementier']?>" width="50px"></td>
    <td ><a href="">Modifier</a></td>
    <td ><a href="">Supprimer</a></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>
<div class="col-2">
</div>
</div>