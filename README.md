LOPStudents
============

Simple plateforme permettant la gestion des étudiants et professeur d'une école

![image](https://user-images.githubusercontent.com/40785379/172646024-10bdadae-5a1d-4d70-b9fb-dc66371d21ae.png)

<a href="https://buymeacoffee.com/machkouroke" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: auto !important;width: auto !important;" ></a>


## Caractéristique
- Flat Design
- Animation sympa
- Visualisations d'étudiants par crictère
- Envoi de mail à un ensemble d'étudiants ou de proffesseur
- Espace étudiants et proffesseur


#### Il existe 3 niveau d'utilisateurs:
- **admin:** Peut ajouter, supprimer ,voir et envoyer des messages à tout étudiants ou proffesseur.
- **teacher:** Peut voir et envoyer des messages à touts étudiants qu'il enseigne
- **Administrator:** Peut voir et envoyer des messages à tous ses camrades et proffesseur

---

## Configuration
- Executer le script de création des pays dans model/sql/countries.sql
- Executer le script de création des villes dans model/sql/cities.sql
- Executer le script de création des tables utilisateurs dans model/sql/LDD.sql
- Créer un utilisateur admin pour se connecter à la base de données (dans la table user crée précedemment et avec le rôle **admin**
- Changer les informations de la base de données avec vos informations dans le fichier **controller/constant.php**
- Lancez un server php comme et accéder à l'adresse crée
```shell
php -S localhost:8000
```



---

## Utilisation

![image](https://user-images.githubusercontent.com/40785379/172649995-99c3c632-22fe-4cb2-b491-106edced52a9.png)

Après avoir configuré le projet vous pouviez sélectionner l'une des actions pour ajouter soit un proffesseur soit un étudiant dans la base de données. Ceux ci pourront par la suite se connecter à la plateforme avec des droits restreints

---

