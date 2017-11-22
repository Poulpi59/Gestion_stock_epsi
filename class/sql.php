<?php

class sql{

  private $bdd;

  function __construct($adr, $login, $pass, $bdd){
    $this->bdd = new PDO("mysql:host=".$adr.";dbname=".$bdd."", $login, $pass);
  }

  function query($query){
    $res = $this->bdd->query($query);
    return $res;
  }

  function close(){
    $this->bdd = null;
  }

  function create_bdd()
  {
    $this->query("CREATE DATABASE IF NOT EXISTS epsi_stock");
    $this->bdd = new PDO("mysql:host=localhost;dbname=epsi_stock","root","");

    # Table: Promotion

    $this->query("CREATE TABLE Promotion(
      id             int (11) Auto_increment  NOT NULL ,
      nom            Varchar (25) ,
      anneePromotion Varchar (25) ,
      PRIMARY KEY (id )
    )ENGINE=InnoDB");

    # Table: Emprunteur

    $this->query("CREATE TABLE Emprunteur(
      id           int (11) Auto_increment  NOT NULL ,
      nom          Varchar (25) ,
      prenom       Varchar (25) ,
      id_Promotion Int ,
      PRIMARY KEY (id )
    )ENGINE=InnoDB");

    # Table: Etat

    $this->query("CREATE TABLE Etat(
      id      int (11) Auto_increment  NOT NULL ,
      libelle Varchar (25) ,
      PRIMARY KEY (id )
    )ENGINE=InnoDB");

    # Table: Objet

    $this->query("CREATE TABLE Objet(
      id           int (11) Auto_increment  NOT NULL ,
      id_TypeObjet Int ,
      id_Marque    Int ,
      id_Modele    Int ,
      PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: Utilisateur

      $this->query("CREATE TABLE Utilisateur(
      id                  int (11) Auto_increment  NOT NULL ,
      nom                 Varchar (25) ,
      prenom              Varchar (25) ,
      id_LoginUtilisateur Int ,
      id_RoleUtilisateur  Int ,
      PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: LoginUtilisateur

      $this->query("CREATE TABLE LoginUtilisateur(
      id         int (11) Auto_increment  NOT NULL ,
      pseudo     Varchar (25) ,
      motDePasse Varchar (25) ,
      PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: RoleUtilisateur

      $this->query("CREATE TABLE RoleUtilisateur(
      id      int (11) Auto_increment  NOT NULL ,
      libelle Varchar (25) ,
      PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: TypeObjet

      $this->query("CREATE TABLE TypeObjet(
      id      int (11) Auto_increment  NOT NULL ,
      libelle Varchar (25) ,
      PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: Modele

      $this->query("CREATE TABLE Modele(
      id      int (11) Auto_increment  NOT NULL ,
      libelle Varchar (25) ,
      PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: Marque

      $this->query("CREATE TABLE Marque(
      id      int (11) Auto_increment  NOT NULL ,
      libelle Varchar (25) ,
      PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: Emprunt

      $this->query("CREATE TABLE Emprunt(
      id                int (11) Auto_increment  NOT NULL ,
      dateDebut         Datetime ,
      dateFinTheorique Datetime ,
      dateRestitution   Datetime ,
      quantiteEmprunte  Int ,
      id_Emprunteur     Int ,
      id_Etat           Int ,
      id_Objet          Int ,
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

      $this->query("  INSERT INTO promotion (nom, anneePromotion)
      VALUES ('UDEV', '2015')");

      $this->query("  INSERT INTO emprunteur (nom, prenom, id_Promotion)
      VALUES ('Max', 'Xam', '1')");

      $this->query("  INSERT INTO typeobjet (libelle)
      VALUES ('souris')");

      $this->query("  INSERT INTO marque (libelle)
      VALUES ('AcerARien')");

      $this->query("  INSERT INTO modele (libelle)
      VALUES ('Super3000')");

      $this->query("  INSERT INTO objet (id_TypeObjet, id_Marque, id_Modele)
      VALUES ('1', '1', '1')");

      $this->query("  INSERT INTO etat (libelle)
      VALUES ('Bad')");

      $this->query("  INSERT INTO emprunt (dateDebut, dateFinTheorique, dateRestitution, quantiteEmprunte, id_Emprunteur, id_Etat, id_Objet)
      VALUES ('1995-03-01', '1995-03-15', '1995-03-30', '1', '1', '1', '1')");

      $this->query("  INSERT INTO emprunt (dateDebut, dateFinTheorique, dateRestitution, quantiteEmprunte, id_Emprunteur, id_Etat, id_Objet)
      VALUES ('1995-03-01', '2017-10-30', '2017-11-30', '1', '1', '1', '1')");

      $this->close();
    }
}
?>