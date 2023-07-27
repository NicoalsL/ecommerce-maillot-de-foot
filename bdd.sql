CREATE TABLE article(
   Id_article COUNTER,
   PRIMARY KEY(Id_article)
);

CREATE TABLE categorie(
   Id_categorie COUNTER,
   nom_categorie VARCHAR(50),
   PRIMARY KEY(Id_categorie)
);

CREATE TABLE club(
   Id_club COUNTER,
   logo VARCHAR(250),
   club VARCHAR(50),
   PRIMARY KEY(Id_club)
);

CREATE TABLE taille(
   Id_taille COUNTER,
   libeller VARCHAR(20),
   conteur INT,
   PRIMARY KEY(Id_taille)
);

CREATE TABLE type_maillot(
   Id_type_maillot COUNTER,
   type_maillot VARCHAR(50),
   PRIMARY KEY(Id_type_maillot)
);

CREATE TABLE equipementier(
   Id_equipementier COUNTER,
   nom_equipementier VARCHAR(50),
   PRIMARY KEY(Id_equipementier)
);

CREATE TABLE users(
   Id_users COUNTER,
   pseudo VARCHAR(100),
   email VARCHAR(100),
   password VARCHAR(250),
   ip VARCHAR(20),
   registreDate DATETIME,
   admin LOGICAL,
   PRIMARY KEY(Id_users)
);

CREATE TABLE achat(
   Id_achat COUNTER,
   date_achat DATE,
   prix_totale INT,
   Id_users INT NOT NULL,
   PRIMARY KEY(Id_achat),
   FOREIGN KEY(Id_users) REFERENCES users(Id_users)
);

CREATE TABLE panier(
   Id_panier COUNTER,
   date_panier DATETIME,
   Id_users INT NOT NULL,
   PRIMARY KEY(Id_panier),
   FOREIGN KEY(Id_users) REFERENCES users(Id_users)
);

CREATE TABLE p_unique(
   Id_p_unique COUNTER,
   image VARCHAR(50),
   saison VARCHAR(50),
   couleur VARCHAR(50),
   chanpionnat VARCHAR(50),
   Id_type_maillot INT NOT NULL,
   Id_article INT NOT NULL,
   Id_club INT NOT NULL,
   PRIMARY KEY(Id_p_unique),
   FOREIGN KEY(Id_type_maillot) REFERENCES type_maillot(Id_type_maillot),
   FOREIGN KEY(Id_article) REFERENCES article(Id_article),
   FOREIGN KEY(Id_club) REFERENCES club(Id_club)
);

CREATE TABLE tarification(
   Id_tarification COUNTER,
   date_tarification DATE,
   prix INT,
   Id_p_unique INT NOT NULL,
   PRIMARY KEY(Id_tarification),
   FOREIGN KEY(Id_p_unique) REFERENCES p_unique(Id_p_unique)
);

CREATE TABLE type_taille(
   Id_categorie INT,
   Id_taille INT,
   PRIMARY KEY(Id_categorie, Id_taille),
   FOREIGN KEY(Id_categorie) REFERENCES categorie(Id_categorie),
   FOREIGN KEY(Id_taille) REFERENCES taille(Id_taille)
);

CREATE TABLE categorie_article(
   Id_article INT,
   Id_categorie INT,
   PRIMARY KEY(Id_article, Id_categorie),
   FOREIGN KEY(Id_article) REFERENCES article(Id_article),
   FOREIGN KEY(Id_categorie) REFERENCES categorie(Id_categorie)
);

CREATE TABLE commande(
   Id_panier INT,
   Id_p_unique INT,
   quantite VARCHAR(50),
   PRIMARY KEY(Id_panier, Id_p_unique),
   FOREIGN KEY(Id_panier) REFERENCES panier(Id_panier),
   FOREIGN KEY(Id_p_unique) REFERENCES p_unique(Id_p_unique)
);

CREATE TABLE affiliation(
   Id_club INT,
   Id_equipementier INT,
   saison VARCHAR(50),
   PRIMARY KEY(Id_club, Id_equipementier),
   FOREIGN KEY(Id_club) REFERENCES club(Id_club),
   FOREIGN KEY(Id_equipementier) REFERENCES equipementier(Id_equipementier)
);

CREATE TABLE stock(
   Id_taille INT,
   Id_p_unique INT,
   quantite VARCHAR(50),
   PRIMARY KEY(Id_taille, Id_p_unique),
   FOREIGN KEY(Id_taille) REFERENCES taille(Id_taille),
   FOREIGN KEY(Id_p_unique) REFERENCES p_unique(Id_p_unique)
);
