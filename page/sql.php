<?php
function mysql_connect($adr, $user, $mdp, $bdd){
  $mysqli = new mysqli($adr, $user, $mdp, $bdd);
  return $mysqli;
}

function mysql_query($mysqli, $query){
  $res = $mysqli->query($query);
  return $res;
}

function create_bdd($mysqli)
  {
      mysql_query($mysqli ,"CREATE DATABASE IF NOT EXISTS epsi_stock");
      $mysqli = @mysql_connect("localhost", "root", "","epsi_stock");

      # Table: Promotion

      mysql_query($mysqli ,"CREATE TABLE Promotion(
              id             int (11) Auto_increment  NOT NULL ,
              nom            Varchar (25) ,
              anneePromotion Varchar (25) ,
              PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: Emprunteur

      mysql_query($mysqli ,"CREATE TABLE Emprunteur(
              id           int (11) Auto_increment  NOT NULL ,
              nom          Varchar (25) ,
              prenom       Varchar (25) ,
              id_Promotion Int ,
              PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: Etat

      mysql_query($mysqli ,"CREATE TABLE Etat(
              id      int (11) Auto_increment  NOT NULL ,
              libelle Varchar (25) ,
              PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: Objet

      mysql_query($mysqli ,"CREATE TABLE Objet(
              id           int (11) Auto_increment  NOT NULL ,
              type         Varchar (25) ,
              id_TypeObjet Int ,
              id_Marque    Int ,
              id_Modele    Int ,
              PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: Utilisateur

      mysql_query($mysqli ,"CREATE TABLE Utilisateur(
              id                  int (11) Auto_increment  NOT NULL ,
              nom                 Varchar (25) ,
              prenom              Varchar (25) ,
              id_LoginUtilisateur Int ,
              id_RoleUtilisateur  Int ,
              PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: LoginUtilisateur

      mysql_query($mysqli ,"CREATE TABLE LoginUtilisateur(
              id         int (11) Auto_increment  NOT NULL ,
              pseudo     Varchar (25) ,
              motDePasse Varchar (25) ,
              PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: RoleUtilisateur

      mysql_query($mysqli ,"CREATE TABLE RoleUtilisateur(
              id      int (11) Auto_increment  NOT NULL ,
              libelle Varchar (25) ,
              PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: TypeObjet

      mysql_query($mysqli ,"CREATE TABLE TypeObjet(
              id      int (11) Auto_increment  NOT NULL ,
              libelle Varchar (25) ,
              PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: Modele

      mysql_query($mysqli ,"CREATE TABLE Modele(
              id      int (11) Auto_increment  NOT NULL ,
              libelle Varchar (25) ,
              PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: Marque

      mysql_query($mysqli ,"CREATE TABLE Marque(
              id      int (11) Auto_increment  NOT NULL ,
              libelle Varchar (25) ,
              PRIMARY KEY (id )
      )ENGINE=InnoDB");

      # Table: Emprunt

      mysql_query($mysqli ,"CREATE TABLE Emprunt(
              id                int (11) Auto_increment  NOT NULL ,
              dateDebut         Datetime ,
              dateFinTherorique Datetime ,
              dateRestitution   Datetime ,
              quantiteEmprunte  Int ,
              id_Emprunteur     Int ,
              id_Etat           Int ,
              id_Objet          Int ,
              PRIMARY KEY (id )
      )ENGINE=InnoDB");

      mysql_query($mysqli ,"ALTER TABLE Emprunteur ADD CONSTRAINT FK_Emprunteur_id_Promotion FOREIGN KEY (id_Promotion) REFERENCES Promotion(id)");
      mysql_query($mysqli ,"ALTER TABLE Objet ADD CONSTRAINT FK_Objet_id_TypeObjet FOREIGN KEY (id_TypeObjet) REFERENCES TypeObjet(id)");
      mysql_query($mysqli ,"ALTER TABLE Objet ADD CONSTRAINT FK_Objet_id_Marque FOREIGN KEY (id_Marque) REFERENCES Marque(id)");
      mysql_query($mysqli ,"ALTER TABLE Objet ADD CONSTRAINT FK_Objet_id_Modele FOREIGN KEY (id_Modele) REFERENCES Modele(id)");
      mysql_query($mysqli ,"ALTER TABLE Utilisateur ADD CONSTRAINT FK_Utilisateur_id_LoginUtilisateur FOREIGN KEY (id_LoginUtilisateur) REFERENCES LoginUtilisateur(id)");
      mysql_query($mysqli ,"ALTER TABLE Utilisateur ADD CONSTRAINT FK_Utilisateur_id_RoleUtilisateur FOREIGN KEY (id_RoleUtilisateur) REFERENCES RoleUtilisateur(id)");
      mysql_query($mysqli ,"ALTER TABLE Emprunt ADD CONSTRAINT FK_Emprunt_id_Emprunteur FOREIGN KEY (id_Emprunteur) REFERENCES Emprunteur(id)");
      mysql_query($mysqli ,"ALTER TABLE Emprunt ADD CONSTRAINT FK_Emprunt_id_Etat FOREIGN KEY (id_Etat) REFERENCES Etat(id)");
      mysql_query($mysqli ,"ALTER TABLE Emprunt ADD CONSTRAINT FK_Emprunt_id_Objet FOREIGN KEY (id_Objet) REFERENCES Objet(id)");

      mysql_query($mysqli ,"  INSERT INTO LoginUtilisateur (pseudo, motDePasse)
                              VALUES ('admin', 'admin')");

      mysql_query($mysqli ,"  INSERT INTO promotion (nom, anneePromotion)
                              VALUES ('UDEV', '2015')");

      mysql_query($mysqli ,"  INSERT INTO emprunteur (nom, prenom, id_Promotion)
                              VALUES ('Max', 'Xam', '1')");

      mysql_query($mysqli ,"  INSERT INTO typeobjet (libelle)
                              VALUES ('souris')");

      mysql_query($mysqli ,"  INSERT INTO marque (libelle)
                              VALUES ('AcerARien')");

      mysql_query($mysqli ,"  INSERT INTO modele (libelle)
                              VALUES ('Super3000')");

      mysql_query($mysqli ,"  INSERT INTO objet (type, id_TypeObjet, id_Marque, id_Modele)
                              VALUES ('test', '1', '1', '1')");

      mysql_query($mysqli ,"  INSERT INTO etat (libelle)
                              VALUES ('Bad')");

      mysql_query($mysqli ,"  INSERT INTO emprunt (dateDebut, dateFinTherorique, dateRestitution, quantiteEmprunte, id_Emprunteur, id_Etat, id_Objet)
                              VALUES ('1995-03-01', '1995-03-15', '1995-03-30', '1', '1', '1', '1')");

      mysql_query($mysqli ,"  INSERT INTO emprunt (dateDebut, dateFinTherorique, dateRestitution, quantiteEmprunte, id_Emprunteur, id_Etat, id_Objet)
                              VALUES ('1995-03-01', '2017-10-30', '2017-11-30', '1', '1', '1', '1')");

      $mysqli->close();
  }
?>
