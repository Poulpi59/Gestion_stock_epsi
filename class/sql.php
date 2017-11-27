<?php

class sql
{

    private $bdd;

    function __construct($adr, $login, $pass, $bdd)
    {
        $this->bdd = new PDO("mysql:host=" . $adr . ";dbname=" . $bdd . "", $login, $pass);
    }

    function create_bdd()
    {
        $this->query("CREATE DATABASE IF NOT EXISTS epsi_stock");
        $this->bdd = new PDO("mysql:host=localhost;dbname=epsi_stock", "root", "");

        # Table: Promotion

        $this->query("CREATE TABLE Promotion(
      id             INT (11) AUTO_INCREMENT  NOT NULL ,
      nom            VARCHAR (25) ,
      anneePromotion VARCHAR (25) ,
      PRIMARY KEY (id )
    )ENGINE=InnoDB");

        # Table: Emprunteur

        $this->query("CREATE TABLE Emprunteur(
      id           INT (11) AUTO_INCREMENT  NOT NULL ,
      nom          VARCHAR (25) ,
      prenom       VARCHAR (25) ,
      id_Promotion INT ,
      PRIMARY KEY (id )
    )ENGINE=InnoDB");

        # Table: Etat

        $this->query("CREATE TABLE Etat(
      id      INT (11) AUTO_INCREMENT  NOT NULL ,
      libelle VARCHAR (25) ,
      PRIMARY KEY (id )
    )ENGINE=InnoDB");

        # Table: Objet

        $this->query("CREATE TABLE Objet(
      id           INT (11) AUTO_INCREMENT  NOT NULL ,
      id_TypeObjet INT ,
      id_Marque    INT ,
      id_Modele    INT ,
      PRIMARY KEY (id )
      )ENGINE=InnoDB");

        # Table: Utilisateur

        $this->query("CREATE TABLE Utilisateur(
      id                  INT (11) AUTO_INCREMENT  NOT NULL ,
      nom                 VARCHAR (25) ,
      prenom              VARCHAR (25) ,
      id_LoginUtilisateur INT ,
      PRIMARY KEY (id )
      )ENGINE=InnoDB");

        # Table: LoginUtilisateur

        $this->query("CREATE TABLE LoginUtilisateur(
      id         INT (11) AUTO_INCREMENT  NOT NULL ,
      pseudo     VARCHAR (25) ,
      motDePasse VARCHAR (25) ,
      PRIMARY KEY (id )
      )ENGINE=InnoDB");

        # Table: TypeObjet

        $this->query("CREATE TABLE TypeObjet(
      id      INT (11) AUTO_INCREMENT  NOT NULL ,
      libelle VARCHAR (25) ,
      PRIMARY KEY (id )
      )ENGINE=InnoDB");

        # Table: Modele

        $this->query("CREATE TABLE Modele(
      id      INT (11) AUTO_INCREMENT  NOT NULL ,
      libelle VARCHAR (25) ,
      PRIMARY KEY (id )
      )ENGINE=InnoDB");

        # Table: Marque

        $this->query("CREATE TABLE Marque(
      id      INT (11) AUTO_INCREMENT  NOT NULL ,
      libelle VARCHAR (25) ,
      PRIMARY KEY (id )
      )ENGINE=InnoDB");

        # Table: Emprunt

        $this->query("CREATE TABLE Emprunt(
      id                INT (11) AUTO_INCREMENT  NOT NULL ,
      dateDebut         DATE ,
      dateFinTheorique  DATE ,
      dateRestitution   DATE DEFAULT NULL,
      quantiteEmprunte  INT ,
      id_Emprunteur     INT ,
      id_Etat           INT ,
      id_Objet          INT ,
      PRIMARY KEY (id )
      )ENGINE=InnoDB");

        $this->query("ALTER TABLE Emprunteur ADD CONSTRAINT FK_Emprunteur_id_Promotion FOREIGN KEY (id_Promotion) REFERENCES Promotion(id)");
        $this->query("ALTER TABLE Objet ADD CONSTRAINT FK_Objet_id_TypeObjet FOREIGN KEY (id_TypeObjet) REFERENCES TypeObjet(id)");
        $this->query("ALTER TABLE Objet ADD CONSTRAINT FK_Objet_id_Marque FOREIGN KEY (id_Marque) REFERENCES Marque(id)");
        $this->query("ALTER TABLE Objet ADD CONSTRAINT FK_Objet_id_Modele FOREIGN KEY (id_Modele) REFERENCES Modele(id)");
        $this->query("ALTER TABLE Utilisateur ADD CONSTRAINT FK_Utilisateur_id_LoginUtilisateur FOREIGN KEY (id_LoginUtilisateur) REFERENCES LoginUtilisateur(id)");
        $this->query("ALTER TABLE Utilisateur ADD CONSTRAINT FK_Utilisateur_id_RoleUtilisateur FOREIGN KEY (id_RoleUtilisateur) REFERENCES RoleUtilisateur(id)");
        $this->query("ALTER TABLE Emprunt ADD CONSTRAINT FK_Emprunt_id_Emprunteur FOREIGN KEY (id_Emprunteur) REFERENCES Emprunteur(id)");
        $this->query("ALTER TABLE Emprunt ADD CONSTRAINT FK_Emprunt_id_Etat FOREIGN KEY (id_Etat) REFERENCES Etat(id)");
        $this->query("ALTER TABLE Emprunt ADD CONSTRAINT FK_Emprunt_id_Objet FOREIGN KEY (id_Objet) REFERENCES Objet(id)");

        $this->query("  INSERT INTO LoginUtilisateur (pseudo, motDePasse)
      VALUES ('admin', 'admin')");

        $this->query("  INSERT INTO utilisateur (nom, prenom, id_LoginUtilisateur)
      VALUES ('Jean', 'Michel', '1')");

        $this->query("  INSERT INTO promotion (nom, anneePromotion)
      VALUES ('UDEV', '2017')");

        $this->query("  INSERT INTO promotion (nom, anneePromotion)
      VALUES ('BTS', '2014')");

        $this->query("  INSERT INTO emprunteur (nom, prenom, id_Promotion)
      VALUES ('Romain', 'Desbois', '1')");

        $this->query("  INSERT INTO emprunteur (nom, prenom, id_Promotion)
      VALUES ('Maxou', 'Bidou', '2')");

        $this->query("  INSERT INTO typeobjet (libelle)
      VALUES ('Souris')");

        $this->query("  INSERT INTO typeobjet (libelle)
      VALUES ('Clavier')");

        $this->query("  INSERT INTO marque (libelle)
      VALUES ('Acer')");

        $this->query("  INSERT INTO marque (libelle)
      VALUES ('Asus')");

        $this->query("  INSERT INTO modele (libelle)
      VALUES ('Game310')");

        $this->query("  INSERT INTO modele (libelle)
      VALUES ('Desk877')");

        $this->query("  INSERT INTO objet (id_TypeObjet, id_Marque, id_Modele)
      VALUES ('1', '1', '1')");

        $this->query("  INSERT INTO objet (id_TypeObjet, id_Marque, id_Modele)
      VALUES ('2', '2', '2')");

        $this->query("  INSERT INTO etat (libelle)
      VALUES ('Bon')");

        $this->query("  INSERT INTO etat (libelle)
      VALUES ('Mauvais')");

        $this->query("  INSERT INTO emprunt (dateDebut, dateFinTheorique, dateRestitution, quantiteEmprunte, id_Emprunteur, id_Etat, id_Objet)
      VALUES ('2017-03-01', '2017-03-15', '2017-03-30', '5', '1', '1', '1')");

        $this->query("  INSERT INTO emprunt (dateDebut, dateFinTheorique, dateRestitution, quantiteEmprunte, id_Emprunteur, id_Etat, id_Objet)
      VALUES ('2017-03-01', '2017-10-30', '2017-11-30', '2', '2', '2', '2')");
        $this->close();
    }

    function query($query)
    {
        $res = $this->bdd->query($query);
        return $res;
    }

    function close()
    {
        $this->bdd = null;
    }
}

?>