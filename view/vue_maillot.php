<?php require '../model/connexion_bdd.php'; ?>

<?php
function affichageProduits(PDO $pdo) {
  $req = $pdo->prepare('SELECT * FROM `produits` 
                        INNER JOIN `club`, `type_maillot`, `tarification`, `categorie`
                        WHERE produits.Id_type_maillot = type_maillot.Id_type_maillot
                        AND  produits.Id_produits = tarification.Id_produits
                        AND  produits.Id_club = club.Id_club
                        AND categorie.Id_categorie = produits.Id_categorie
                        ORDER BY club.club ASC
                        ');
    $req -> execute();
    $produits = $req->fetchAll();

  // Vérifier si des données ont été récupérées
  if (empty($produits)) {
    http_response_code(404); // Envoyer une réponse 404 (non trouvé)
    exit();
  }

  // Définir l'en-tête de réponse pour indiquer le type de contenu JSON
  header('Content-Type: application/json');

  // Envoyer les données JSON en réponse
  echo json_encode($produits);
}

// Appeler la fonction pour renvoyer les données JSON
affichageProduits($pdo);
