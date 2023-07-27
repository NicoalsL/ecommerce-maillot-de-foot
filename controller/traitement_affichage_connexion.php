<?php
$message = 23;
if(isset($_POST['email'], $_POST['password'])){
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