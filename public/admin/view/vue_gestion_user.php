<?php
$req = $pdo -> prepare('SELECT * FROM users');
$req ->execute();

$users = $req->fetchAll();
?>



<div class="container text-center">
<div class="row">
<div class="col-xs-2">
    </div>
    <div class="col-xs-8">
        <h1>users</h1>
    </div>
    <div class="col-xs-2">
    </div>
</div>
    <div class="row">
        <div class="col-xl-2">
    </div>
    <div class="col-xl-8">

<table class="table">
<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Pseudo</th>
        <th scope="col">email</th>
        <th scope="col">Admin</th>
        <th scope="col">Date</th>
    </tr>
</thead>

<tbody>
        <?php foreach ($users as $user): ?>
    <tr>
    <th scope="row"><?=$user['Id_users']?></th>
    <td><?=$user['pseudo']?></td>
    <td><?=$user['email']?></td>
    <td><?php if((int)$user['admin'] === 1){ echo 'admin';}else{ echo 'non admin';} ?></td>
    <td><?=$user['registerDate']?></td>
    </tr>
    <?php endforeach ?>
</tbody>
</table>
</div>

<div class="col-xl-2">
    </div>
</div>
</div>