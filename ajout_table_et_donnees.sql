-- Creation de la table client
CREATE TABLE client(
   id INT NOT NULL AUTO_INCREMENT ,
   nom VARCHAR(100) NOT NULL,
   prenom VARCHAR(100) NOT NULL,
   telephone VARCHAR(20) NOT NULL UNIQUE,
   PRIMARY KEY(id)
);

-- Creation de la table etatcom
CREATE TABLE etatcom(
   idetat INT NOT NULL AUTO_INCREMENT ,
   nometat VARCHAR(20),
   PRIMARY KEY(idetat)
);

-- Creation de la table commande
CREATE TABLE commande(
   idc INT NOT NULL AUTO_INCREMENT ,
   datec DATE,
   montant VARCHAR(100),
   idetat INT NOT NULL,
   id INT NOT NULL,
   FOREIGN KEY(id) REFERENCES client(id),
   FOREIGN KEY(idetat) REFERENCES etatcom(idetat),
   PRIMARY KEY(idc)
);

-- Creation de la table article
CREATE TABLE article(
   ida INT NOT NULL AUTO_INCREMENT,
   libelle VARCHAR(50),
   prixunitaire VARCHAR(10),
   qtestock int,
   PRIMARY KEY(ida)
);

-- Creation de la table avoir
CREATE TABLE avoir(
   qtecmd INT,
   idc INT NOT NULL,
   ida INT NOT NULL,
   FOREIGN KEY(idc) REFERENCES commande(idc),
   FOREIGN KEY(ida) REFERENCES article(ida)
);


-- Insertion de données dans la table client
INSERT INTO client (nom, prenom, telephone) VALUES
('Ba', 'Badara', '772641040'),
('Doe', 'John', '1234567890'),
('Smith', 'Alice', '9876543210'),
('Johnson', 'Michael', '5555555555'),
('Brown', 'Emily', '1112223333'),
('Taylor', 'James', '4444444444'),
('Anderson', 'Sophia', '6667778888'),
('Martinez', 'Daniel', '9990001111'),
('Wilson', 'Olivia', '2223334444'),
('Thomas', 'William', '7778889999');

-- Insertion de données dans la table etatcom
INSERT INTO etatcom (nometat) VALUES
('En cours'),
('En attente'),
('Livré'),
('Annulé');

-- Insertion de données dans la table commande
INSERT INTO commande (datec, montant, idetat, id) VALUES
('2024-02-20', '5000', 1, 1),
('2024-02-21', '7500', 2, 2),
('2024-02-22', '10000', 3, 3),
('2024-02-23', '2500', 4, 4),
('2024-02-24', '20000', 1, 5),
('2024-02-25', '15000', 3, 6),
('2024-02-26', '8000', 2, 7),
('2024-02-27', '12000', 3, 8),
('2024-02-28', '9000', 1, 9);

-- Insertion de données dans la table article
INSERT INTO article (libelle, prixunitaire, qtestock) VALUES
('Article 1', '1000', 100),
('Article 2', '2000', 150),
('Article 3', '3000', 200),
('Article 4', '1500', 75),
('Article 5', '5000', 120),
('Article 6', '2500', 180),
('Article 7', '3500', 220),
('Article 8', '4000', 90),
('Article 9', '4500', 110);

-- Insertion de données dans la table avoir
INSERT INTO avoir (qtecmd, idc, ida) VALUES
(2, 1, 1),
(3, 1, 2),
(1, 1, 3),
(4, 1, 4),
(3, 2, 2),
(2, 2, 1),
(1, 3, 7),
(1, 3, 3),
(4, 4, 4),
(8, 4, 9),
(2, 5, 5),
(3, 5, 6),
(3, 6, 6),
(4, 6, 4),
(2, 6, 5),
(1, 7, 7),
(2, 8, 5),
(3, 8, 6),
(1, 8, 7),
(2, 8, 8),
(4, 9, 9),
(2, 9, 8);
