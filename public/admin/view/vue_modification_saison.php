<?php 
if(isset($_GET['id'])){
    if(isset($_POST['saison'])){
        $idSaison = (int)$_GET['id'];
        $saison = htmlspecialchars($_POST['saison'], ENT_QUOTES | ENT_HTML5 | ENT_DISALLOWED, 'UTF-8');
        echo $idSaison;
        $req = $pdo ->prepare('UPDATE saison SET saison = :saison WHERE Id_saison = :Id_saison');
        $req -> bindValue('Id_saison', $idSaison);
        $req -> bindValue('saison', $saison);
        $req ->execute();
    }
}
?>
<form action="" method="post">
    <input type="text" name="saison">
    <button type="submit">Modifier</button>
</form>
