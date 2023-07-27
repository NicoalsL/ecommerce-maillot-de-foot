<?php
if (isset($_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['password_retype'])) {

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    // Valider les données

    $errors = [];

    if (strlen($pseudo) > 20) {
        $errors[] = 'Pseudo trop long, il ne doit pas dépasser 20 caractères.';
    }

    if (strlen($email) > 320) {
        $errors[] = 'Email trop long, il ne doit pas dépasser 100 caractères.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Adresse email invalide.';
    }
    
    if (!preg_match('/^\S+$/', $password)) {
        $errors[] = 'Le mot de passe ne doit pas être vide ou rempli d\'espaces.';
    }

    if (!preg_match('/^(?=.*\d)(?=.*[A-Z])/', $password)) {
        $errors[] = 'Le mot de passe doit contenir au moins un chiffre et une majuscule.';
    }

    if ($password !== $password_retype) {
        $errors[] = 'Les mots de passe ne correspondent pas.';
    }

    // Si aucune erreur n'a été trouvée, procéder à l'inscription
    
    if (empty($errors)) {

        $query = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindValue(':email', $email);
        $query->execute();
        $emailExists = $query->rowCount();

        if ($emailExists !== 0) {
            $errors[] = 'Cet email est déjà utilisé.';
        } else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


            $insertQuery = $pdo->prepare('INSERT INTO users (pseudo, email, password) VALUES (:pseudo, :email, :password)');
            $insertQuery->bindValue(':pseudo', $pseudo);
            $insertQuery->bindValue(':email', $email);
            $insertQuery->bindValue(':password', $hashedPassword);
            $insertQuery->execute();


            ?><script>window.location = "?page=vue_accueil";</script><?php
        }
    }
}