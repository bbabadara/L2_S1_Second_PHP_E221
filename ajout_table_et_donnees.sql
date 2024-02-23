--Creation de la table commande
CREATE TABLE commande(
   idc INT NOT NULL AUTO_INCREMENT ,
   datec DATE,
   montant VARCHAR(100),
   etat VARCHAR(10),
   PRIMARY KEY(idc)
);

--Creation de la table article
CREATE TABLE article(
   ida INT NOT NULL AUTO_INCREMENT,
   libelle VARCHAR(50),
   prixunitaire VARCHAR(10),
   qtestock int,
   PRIMARY KEY(ida)
);

--Creation de la table avoir
CREATE TABLE avoir(
   qtecmd INT,
   idc INT NOT NULL,
   ida INT NOT NULL,
   FOREIGN KEY(idc) REFERENCES commande(idc),
   FOREIGN KEY(ida) REFERENCES article(ida)
);


-- Ajout des donnees  dans la table commande
INSERT INTO commande (datec, montant, etat) VALUES 
('2024-02-23', '50000', 1),
('2024-02-22', '30000', 2),
('2024-02-21', '75500', 1);


-- Ajout des donnees  dans la table article
INSERT INTO article (libelle, prixunitaire, qtestock) VALUES 
('Article 1', '1000', 100),
('Article 2', '2500', 50),
('Article 3', '550', 200),
('Article 4', '850', 20),
('Article 5', '5500', 150);

-- Ajout des donnees  dans la table avoir
INSERT INTO avoir (qtecmd, idc, ida) VALUES 
(2, 1, 1),
(1, 2, 3),
(3, 3, 2);


