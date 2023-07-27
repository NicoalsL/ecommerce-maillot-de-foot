<?php require '../controller/traitement_taille.php'; ?>

<div class="container text-center">
  <div class="row align-items-start">
    <div class="col-2">
    </div>
    <div class="col-8">
      <h1>Taille</h1>
    </div>
    <div class="col-2">
    </div>
  </div>

  <div class="row m-3">
    <div class="col-2">
    </div>
    <div class="col-8">
      <form method="POST">
        <div class="mb-3">
          <label for="categorie" class="form-label">
            <p>Choissiez la categorie dont vous voulez ajoutez une taille</p>
          </label>
          <select class="form-select" name="categorie" id="categorie">
            <?php foreach ($categories as $categorie) : ?>
              <option value="<?= $categorie['Id_categorie'] ?>"><?= ucfirst($categorie['categorie'])?></option>
            <?php endforeach ?>
          </select>
          <label for="taille" class="form-label">Taille</label>
          <input class="form-control" type="text" name="taille" id="taille" placeholder="taille" required="required">
        </div>
        <div class="mb-3">
          <label for="ordre" class="form-label">Ordre</label>
          <input class="form-control" type="number" name="ordre" id="ordre" placeholder="ordre" required="required">
        </div>
        <div class="mb-3 form-check">
          <button type="submit" id="submit" name="submit" value="submit" class="btn vert">Valider</button>
        </form>
      </div>
    </div>
    <div class="col-2">
    </div>
  </div>

  <div class="row align-items-start m-4">
    <div class="col-2">
    </div>
    <div class="col-8">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Categorie</th>
            <th scope="col">Libeller</th>
            <th scope="col">Ordre</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($uniteValeurs as $uniteValeur) : ?>
            <tr>
              <th scope="row"><?= $uniteValeur['Id_taille'] ?></th>
              <td><?= ucfirst($uniteValeur['categorie']) ?></td>
              <td><?= ucfirst($uniteValeur['libeller']) ?></td>
              <td><?= $uniteValeur['ordre'] ?></td>
              <td><a href="?page=modification_taille&id=<?=$uniteValeur['Id_taille'] ?>"><i class="fa-solid fa-pen-to-square" style="color: #1ABC9c;"></i></a></td>
              <td><a href="?page=suppression_taille&id=<?=$uniteValeur['Id_taille'] ?>"><i class="fa-solid fa-delete-left" style="color: #1ABC9c;"></i></a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <div class="col-2">
    </div>
  </div>

</div>

<style>
  .vert{
    background-color: #1abc9c !important;
    color: white !important;
  }
</style>