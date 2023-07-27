<?php require '../controller/traitement_affichage_inscription.php' ?>

<div class="container_connexion">
    <form action="" method="post">
        <input type="text" name="pseudo" placeholder="pseudo" required="required" autocomplete="off" value="<?php if(isset($_POST['pseudo'])){echo$_POST['pseudo'];}; ?>">
        <input type="email" name="email" placeholder="email" required="required" autocomplete="off" value="<?php if(isset($_POST['email'])){echo$_POST['email'];}; ?>">
        <input type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off" >
        <input type="password" name="password_retype" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off" >
        <button type="submit" class="envoyer">Inscription</button>
    </form>
</div>
<?php if( !empty($errors)  ){ ?>
    <?php foreach ( $errors as $error ) : ?>

    <p><?= $error ?></p>
    <?php endforeach ?>

    <?php } ?>
<style>
    .container_connexion{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 70vh;
        width: 100%;
    }
    .container_connexion form{
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 400px;
        width: 400px;
        padding: 0;
        margin: 0;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.6);
        border-radius: 5px;
    }

    .container_connexion form input {
        background-color: #f2f2f2;
        height: 4vh;
        width: 10vw;
        border-radius: 2vh;
        border: none;
        margin: 10px;
    }
    .container_connexion form .envoyer{
        background-color: #1ABC9c;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 50px;
        min-width: 250px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
        margin-left: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .container_connexion form .envoyer:hover{
        background-color: #16a085;
    }
</style>