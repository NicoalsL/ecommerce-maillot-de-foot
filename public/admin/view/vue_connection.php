<?php
$message = 23;
if(isset($_POST['email'], $_POST['password'])){
  echo 'ok';
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $check = $pdo->prepare('SELECT Id_users, pseudo, email, password, admin FROM users where email = :email');
        $check -> bindValue('email', $email);
        $check->execute();
        $data = $check->fetch();
        $row = $check->rowCount();
        if($row === 1){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                if(password_verify($password, $data['password']) === true){
                    (int)$_SESSION['id'] = (int)$data['Id_users'];
                    $_SESSION['user'] = $data['pseudo'];
                    (int)$_SESSION['role'] = (int)$data['admin'];
                    ?>
                                        <script>window.location = "?page=vue_accueil";</script>
                    <?php
                }else {$message = 'Mauvais mot de passe';}
            } else {$message = 'Mauvaise email';}
        } else {$message = "L'adresse email n'apartien pas a un utilisateur";}
    } 
    ?>

<div class="container text-center  ">
<div class="row align-items-start align-self-center ">
 <div class="col-4"></div>   

 <div class="col-4 align-self-center">
<form action="" method="post">
<div class="mb-3">

  <label for="email" class="form-label">Email address</label>
  <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
</div>
    <label for="password" class="form-label">Password</label>
<input name="password" type="password" id="password" class="form-control" aria-labelledby="passwordHelpBlock">
<div id="passwordHelpBlock" class="form-text">
  Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
</div>
<div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
  </div>
</form> 

</div>
<div class="col-4"></div>   
</div>
</div>
</div>
