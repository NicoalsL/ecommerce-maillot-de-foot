<?php require '../controller/traitement_categorie.php'; ?>
<?php require '../controller/traitement_type_maillot.php'; ?>

<div class="container text-center">
  <div class="row align-items-start">
    <div class="col-2">
    </div>
    <div class="col-8">
      <h1>Catégorie</h1>
    </div>
    <div class="col-2">
    </div>
  </div>

  <div class="row align-items-start">
    <div class="col-2">
    </div>
    <div class="col-8">
      <form method="POST">
        <label for="categorie" class="form-label m-3">Catégorie</label>
        <input class="form-control" type="text" name="categorie" id="categorie" placeholder="Catégorie" required="required">
        <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary m-3">Submit</button>
      </form>
    </div>
    <div class="col-2">
    </div>
  </div>

  <div class="row align-items-start">
    <div class="col-2">
    </div>

    <div class="col-8">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Categorie</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($categories as $categorie) : ?>
            <tr>
              <th scope="row"><?= $categorie['Id_categorie'] ?></th>
              <td><?= $categorie['categorie'] ?></td>
              <td><a href="">Modifier</a></td>
              <td><a href="">Supprimer</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <div class="col-2">
    </div>
  </div>

  <div class="row align-items-start">
    <div class="col-2">
    </div>
    <div class="col-8">
      <h1>Type maillot</h1>
    </div>
    <div class="col-2">
    </div>
  </div>

  <div class="row align-items-start">
    <div class="col-2">
    </div>
    <div class="col-8">
      <form method="POST">
        <label for="categorie" class="form-label m-3">Type maillot</label>
        <input class="form-control" type="text" name="type_maillot" id="type_maillot" placeholder="Type maillot" required="required">
        <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary m-3">Submit</button>
      </form>
    </div>
    <div class="col-2">
    </div>
  </div>

  <div class="row align-items-start">
    <div class="col-2">
    </div>

    <div class="col-8">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Categorie</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($typeMaillots as $typeMaillot) : ?>
            <tr>
              <th scope="row"><?= $typeMaillot['Id_type_maillot'] ?></th>
              <td><?= $typeMaillot['type_maillot'] ?></td>
              <td><a href="">Modifier</a></td>
              <td><a href="">Supprimer</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <div class="col-2">
    </div>
  </div>
</div>