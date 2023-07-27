<div class="container text-center">

<div class="afficahge_inscription">

    <p>Connectez-vous a un compte ou créez-en un.</p>
    <div class="container-btn">
        <div class="row">
            <p>Utilisateurs existants</p>
            <a href="?page=vue_connexion" >Se connecter</a>
        </div>
        <div class="row">
            <p>Vous n'avez pas de compte ?</p>
            <a href="?page=vue_inscription" >S'inscrire</a>
        </div>
    </div>

</div>
</div>
<style>
    .contenaire_inscription{
        height: 75vh ;
        width: 700px;
        padding: 20px;
        background-color: white;
        box-shadow: 0px 0px 10px rgba(0,0,0,O.1);
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: red;
    }
    .row{
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 20px;
    }
    .row p {
        text-align: center;
        font-size: 14px;
        font-weight: bold;
        margin: 0;
    }
    .afficahge_inscription{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }
    .container-btn{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        width: 40vw;
    }
    .afficahge_inscription p{
        text-align: center;
        max-width: 250px;
    }
    .row{
        padding: 10px;

    }
    .row a{
        background-color: #1ABC9c;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 50px;
        width: 150px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
        margin-left: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .row a:hover{
        background-color: #16a085;
    }
</style>


