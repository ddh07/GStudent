
use bd_gest_project;

-- Insertion des filières
INSERT INTO filieres (libelle_filiere, description_filiere) VALUES ('Informatique', 'Filière en développement logiciel');
INSERT INTO filieres (libelle_filiere, description_filiere) VALUES ('Réseaux', 'Filière en infrastructure et sécurité');
INSERT INTO filieres (libelle_filiere, description_filiere) VALUES ('Gestion', 'Filière en management et comptabilité');

-- Insertion des rôles
INSERT INTO roles (libelle_role, description_role) VALUES ('Administrateur', 'Responsable de la plateforme');
INSERT INTO roles (libelle_role, description_role) VALUES ('Secrétaire', 'Chargé des inscriptions');
INSERT INTO roles (libelle_role, description_role) VALUES ('Professeur', 'Accès aux étudiants');

-- Insertion des utilisateurs
INSERT INTO utilisateurs (ud_utilisateur, username, password, role) VALUES (1, 'user1', 'pass1', 3);
INSERT INTO utilisateurs (ud_utilisateur, username, password, role) VALUES (2, 'user2', 'pass2', 2);
INSERT INTO utilisateurs (ud_utilisateur, username, password, role) VALUES (3, 'user3', 'pass3', 3);
INSERT INTO utilisateurs (ud_utilisateur, username, password, role) VALUES (4, 'user4', 'pass4', 2);
INSERT INTO utilisateurs (ud_utilisateur, username, password, role) VALUES (5, 'user5', 'pass5', 3);

-- Insertion des étudiants
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Delaunay', 'Antoine', 22, '2003-08-15', 3, '2023-11-21');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Berger', 'Martine', 26, '1999-12-27', 1, '2019-08-05');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Nguyen', 'Benjamin', 19, '2006-02-11', 2, '2024-11-22');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Garcia', 'Robert', 20, '2005-06-30', 2, '2025-06-19');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Delorme', 'Christophe', 20, '2005-06-28', 2, '2025-05-11');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Maréchal', 'Bernard', 21, '2004-09-27', 2, '2023-08-11');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Leduc', 'Isabelle', 24, '2001-02-09', 3, '2020-02-18');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Blanchet', 'Auguste', 25, '2000-08-28', 3, '2020-07-14');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Cohen', 'Noël', 25, '2000-06-26', 3, '2019-08-18');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('David', 'Gérard', 25, '2000-09-26', 3, '2020-12-11');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Paris', 'Martin', 24, '2001-03-14', 1, '2021-05-08');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Guilbert', 'Danielle', 24, '2001-06-01', 2, '2021-09-27');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Letellier', 'Jeanne', 21, '2004-07-07', 2, '2023-08-25');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Peron', 'Honoré', 18, '2007-03-12', 2, '2026-06-23');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Brunel', 'Lucas', 23, '2002-08-20', 3, '2021-11-17');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Marion', 'Mathilde', 21, '2004-03-19', 2, '2024-07-16');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Lecoq', 'Augustin', 24, '2001-09-22', 1, '2020-06-09');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Chartier', 'Anastasie', 25, '2000-07-23', 3, '2019-03-13');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Ferrand', 'Théodore', 23, '2002-04-11', 3, '2022-07-10');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Marin', 'Hélène', 23, '2002-03-08', 3, '2020-09-23');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Rémy', 'Olivier', 24, '2001-08-31', 1, '2022-07-07');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Blanc', 'Anne', 19, '2006-11-03', 3, '2025-05-27');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Weber', 'Laurence', 23, '2002-03-10', 2, '2020-11-21');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Lemonnier', 'Claire', 19, '2006-06-16', 1, '2025-08-21');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Berthelot', 'Dominique', 26, '1999-10-19', 2, '2018-08-29');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Delaunay', 'Françoise', 25, '2000-11-03', 1, '2020-10-27');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Ledoux', 'Susanne', 26, '1999-12-26', 1, '2018-07-17');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Legendre', 'Joséphine', 26, '1999-10-17', 2, '2020-10-03');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Adam', 'Jules', 24, '2001-09-03', 3, '2019-12-15');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Seguin', 'Sébastien', 25, '2000-01-09', 2, '2020-07-27');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Poirier', 'Marianne', 20, '2005-08-30', 1, '2026-07-15');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Lesage', 'Eugène', 23, '2002-04-02', 2, '2023-01-02');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Bigot', 'Grégoire', 20, '2005-11-22', 2, '2025-06-30');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Bonneau', 'Nathalie', 25, '2000-07-04', 3, '2019-04-25');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Brun', 'Gilbert', 18, '2007-04-26', 3, '2027-07-30');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Robin', 'Christiane', 20, '2005-04-03', 3, '2023-10-11');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Colas', 'Margaret', 21, '2004-02-08', 2, '2023-05-11');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Hernandez', 'Édouard', 25, '2000-04-11', 1, '2018-04-11');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Picard', 'Aimé', 23, '2002-06-20', 1, '2022-09-12');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Carpentier', 'Sylvie', 23, '2002-10-10', 1, '2022-05-19');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Besson', 'Astrid', 23, '2002-01-02', 1, '2020-04-05');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Mallet', 'Dorothée', 24, '2001-09-17', 3, '2022-06-03');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Picard', 'Roger', 22, '2003-10-10', 2, '2023-11-05');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Perez', 'Marcel', 19, '2006-04-17', 1, '2026-03-19');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Marin', 'Joséphine', 18, '2007-05-21', 2, '2026-02-12');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Arnaud', 'David', 21, '2004-05-21', 3, '2022-09-07');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Torres', 'Lorraine', 23, '2002-02-05', 2, '2020-09-29');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Cordier', 'Antoine', 20, '2005-03-30', 3, '2024-03-30');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Besson', 'Nicolas', 26, '1999-07-06', 2, '2018-11-07');
INSERT INTO etudiants (nom_etudiant, Prenom_etudiant, age, date_naissance, filiere, date_inscription) VALUES ('Pruvost', 'Stéphanie', 20, '2005-11-14', 2, '2025-03-10');

-- Insertion des actions de gestion
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (5, 33, 'Creation', '2024-12-02');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (3, 18, 'Creation', '2025-04-11');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (2, 47, 'Modification', '2024-06-28');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (2, 46, 'Modification', '2024-07-04');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (3, 47, 'Creation', '2025-02-04');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (2, 1, 'Modification', '2025-03-02');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (2, 38, 'Creation', '2025-04-05');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (4, 9, 'Creation', '2025-04-23');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (3, 17, 'Creation', '2024-07-23');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (5, 13, 'Creation', '2025-05-24');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (1, 20, 'Modification', '2025-03-10');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (4, 49, 'Creation', '2024-07-18');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (4, 25, 'Creation', '2025-03-27');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (3, 10, 'Modification', '2024-09-15');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (5, 18, 'Suppression', '2025-01-14');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (5, 44, 'Creation', '2025-01-24');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (1, 39, 'Modification', '2024-12-24');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (4, 41, 'Suppression', '2024-12-07');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (4, 49, 'Creation', '2025-01-10');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (5, 8, 'Suppression', '2024-07-25');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (1, 46, 'Creation', '2025-01-12');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (5, 34, 'Suppression', '2025-01-25');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (3, 34, 'Suppression', '2025-06-01');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (1, 4, 'Creation', '2025-02-04');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (2, 49, 'Creation', '2025-04-09');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (1, 35, 'Suppression', '2025-01-28');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (4, 49, 'Modification', '2025-03-28');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (4, 30, 'Modification', '2024-10-06');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (5, 37, 'Suppression', '2024-10-24');
INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion) VALUES (5, 30, 'Modification', '2025-05-14');