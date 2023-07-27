<?php
if(isset($_GET['id'])){
    $idSaison = (int)$_GET['id'];
    $req = $pdo -> prepare('DELETE FROM saison WHERE Id_saison = :Id_saison');
    $req -> bindValue('Id_saison', $idSaison, PDO::PARAM_INT);
    $req -> execute();
}

if(isset($_POST['submit'])){
    if(isset($_POST['saison'])){
    $saison = htmlspecialchars($_POST['saison'], ENT_QUOTES | ENT_HTML5 | ENT_DISALLOWED, 'UTF-8');

    $request= $pdo->prepare('SELECT * FROM saison WHERE saison = :saison');
    $request -> bindValue( 'saison', $saison);
    $request -> execute();
    $count_saison = $request -> fetchColumn();
    var_dump($count_saison);

        if($count_saison <= 0){
    $insert = $pdo ->prepare('INSERT INTO saison(saison) VALUES (:saison)');
    $insert -> execute([
        'saison' => $saison
    ]);
        }else{
            echo 'Echouer';
        }
    }
}


$req= $pdo->prepare('SELECT * FROM saison');
$req -> execute();
$saisons = $req->fetchAll();


?>

<div class="container text-center">

<h1>Saison</h1>
<form method="POST">
        <p>Saison</p>
        <input class="form-control" name="saison"type="text" placeholder="Equipementier" required="required">
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
      <th scope="col">Saison</th>
      <th scope="col">modifier</th>
      <th scope="col">supprimer</th>
    </tr>
  </thead>

  <tbody>
        <?php foreach ($saisons as $saison): ?>

    <tr>
    <th scope="row"><?=$saison['Id_saison']?></th>
    <td><?=$saison['saison']?></td>
    <td><a href="?page=modification_saison&id=<?=$saison['Id_saison']?>">Modifier</a></td>
                <td><a href="?page=vue_saison&id=<?=$saison['Id_saison']?>">Supprimer</a></td>
    </tr>

    <?php endforeach ?>

  </tbody>
</table>
</div>

<div class="col-2">
    </div>
</div>
</div>