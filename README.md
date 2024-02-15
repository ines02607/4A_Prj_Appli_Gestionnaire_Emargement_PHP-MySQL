# GESTIONNAIRE D'ÉMARGEMENT

## DESCRIPTION

Le Gestionnaire d'émargement est une application web conçue pour faciliter la gestion des feuilles d'émargement au sein du département informatique. Cette application permet à la secrétaire du département de générer des feuilles d'émargement préremplies à partir des listes d'étudiants renseignées dans la base de données de l'application, ainsi que de l'emploi du temps récupéré dynamiquement du service ADE de l'ENT.

## FONCTIONS PRINCIPALES

- **GÉNÉRATION DE FEUILLES D'ÉMARGEMENT PRÉREMPLIES :** La secrétaire peut générer des feuilles d'émargement en utilisant les listes d'étudiants disponibles dans la base de données de l'application et l'emploi du temps récupéré dynamiquement.

## FONCTIONS SECONDAIRES

- **GESTION DU PROFIL :** La secrétaire peut gérer son profil, notamment en modifiant son mot de passe.
- **GESTION DES ÉTUDIANTS :** La secrétaire peut ajouter, supprimer ou mettre à jour le profil d'un étudiant.

## TECHNOLOGIES UTILISÉES

- **BACKEND :** PHP
- **FRONTEND :** HTML, CSS

## PRÉREQUIS

Avant de lancer l'application, assurez-vous d'avoir installé XAMPP sur votre système. XAMPP est un ensemble de logiciels gratuits permettant de mettre en place un serveur web local.

## LANCEMENT DE L'APPLICATION

1. Clonez ce dépôt Git dans le dossier `htdocs` de votre installation XAMPP. Le dossier devrait être nommé `GestionnaireEmargement`.
   
2. Démarrez les serveurs Apache et MySQL via XAMPP : 
- Sous Windows, via le panneau de contrôle XAMPP
- Sous Linux : 
```bash
$ sudo /opt/lampp/lampp start
```
- Sous MacOS
```bash
sudo /Applications/XAMPP/xamppfiles/xampp start
```


Pour éviter tout conflit entre XAMPP et des serveurs préinstallés, il est conseillé d'effectuer les commandes suivantes au préalable :

```bash
$ sudo systemctl stop apache2
$ sudo systemctl stop mysql
```

3. Configurez la BDD : <br>
→ Entrez `http://localhost/phpmyadmin` dans votre navigateur<br>
→ "New" > Database : nommez la nouvelle base "gestionnaireemargement" → "Go"<br>
→ cliquez sur "gestionnaireemargement" à gauche<br>
→ cliquez sur "SQL" <br>
→ copiez le contenu du fichier `database` > `gestionnaireemargement.sql` du projet


3. Ouvrez un navigateur web et accédez à l'URL suivante : `http://localhost/GestionnaireEmargement`.

4. Vous devriez être redirigé vers la page d'accueil de l'application. Connectez-vous en utilisant :
- L'identifiant : MR001INFO
- Le mot de passe : MR123456! (La secrétaire devra le modifier lors de sa première utilisation)

## AUTEUR

Kamilia CHAKER
Inès MAZOUZ
Yanis KRAIMI

## LICENCE

Ce projet est sous licence [MIT](https://opensource.org/licenses/MIT).

### NOTES

Suivant le système d'exploitation, le chemin vers MySQL diffère. Il faut donc sélectionner le bon chemin dans `dev.ini` du dossier `config`
