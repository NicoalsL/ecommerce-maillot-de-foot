<?php
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    if(isset($_POST['championnat'], $_FILES['logo_championnat'])){

        $championnat = htmlspecialchars($_POST['championnat'], ENT_QUOTES | ENT_HTML5 | ENT_DISALLOWED, 'UTF-8');
        $logochampionnat = $_FILES['logo_championnat'];

        $extension = pathinfo($_FILES['logo_championnat']['name'], PATHINFO_EXTENSION);
        $nomFichier = '_'.$championnat.'.'.$extension ;
        $dossierSite = '../../assets/images/'.$nomFichier;
        
        if(move_uploaded_file($_FILES['logo_championnat']['tmp_name'], $dossierSite)){
            echo "Fichier téléchargé avec succès.";
        } else {
            echo "Erreur lors du téléchargement du fichier.";
        }

        $req = $pdo -> prepare('UPDATE championnat SET championnat= :championnat, logo_championnat = :logo_championnat WHERE Id_championnat = :Id_championnat ');
        $req -> bindValue('Id_championnat', $id, PDO::PARAM_INT);
        $req -> bindValue('championnat', $championnat);
        $req -> bindValue('logo_championnat', $nomFichier);
        $req -> execute();
    }

}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="championnat" placeholder="Championnat" required="required">
    <input name="logo_championnat" type="file"  required="required">
    <button type="submit">Modifier</button>
</form>