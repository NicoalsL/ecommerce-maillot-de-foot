<?php require '../controller/traitement_affichage_connexion.php' ?>
<div class="container text-center">

    <div class="login-form">
        <form action="" method="post">
            <h2 class="text-center">Connexion</h2>
            <div class="form-group">
            <?php if( $message !== 23){ ?>
                <div class="alert alert-danger">
                    
                    <p> <?= $message ?></p>
                </div>
    <?php } ?>
                <input type="email" name="email" class="form-control" placeholder="email" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit">Connexion</button>
            </div>
        </form>
    </div>
</div>

<style>
        .contenaire_inscription{
        height: 75vh ;
        width: 600px;
        padding: 20px;
        background-color: white;
        box-shadow: 0px 0px 10px rgba(0,0,0,O.1);
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .login-form{
        width: 340px;
        margin: 50px auto;
    }
    .login-form form{
        margin-bottom: 15px;
        background-color: #f7f7f7;
        box-shadow: 0 2 2 rgba(0,0,0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control{
        min-height: 38px;
        border-radius: 2px;
    }
    .form-group{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .form-group input {
        background-color: white;
        height: 4vh;
        width: 10vw;
        border-radius: 2vh;
        border: none;
        margin: 10px;
    }
    .form-group button {
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
        font-weight: bold;
    }
</style>