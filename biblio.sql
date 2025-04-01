USE biblio;
CREATE TABLE Etudiant(
    codeEtudiant int  unsigned  PRIMARY KEY,
    nom varchar(20),
    prenom varchar(20),
    adresse varchar(20),
    classe varchar(20)

);
CREATE TABLE livre(
    codeLivre int unsigned Auto_increment PRIMARY KEY,
    titre varchar(20),
    auteur varchar(20),
    dateEdition date

);

CREATE TABLE Emprunter(
     CREATE TABLE Emprunter(
     codeEtudiant int  ,
     codeLivre int  ,
    dateEmprunt date DEFAULT CURRENT_DATE,
     PRIMARY KEY(codeEtudiant, codeLivre),
     foreign key(codeLivre) references livre(codeLivre),
     foreign key(codeEtudiant) references Etudiant(codeEtudiant)
     

)

)

insert into etudiant value (5,'bennani','zineb','badr','dev106');
insert into livre value ('base donnee','boufou','1999-06-15');
insert into Emprunter value(5,1)