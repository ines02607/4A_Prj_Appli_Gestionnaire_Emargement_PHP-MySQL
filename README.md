# **Application de Gestionnaire d'émargement**

<br>

##### **Réalisé par Kamilia CHAKER, Yanis KRAIMI, Inès MAZOUZ, étudiants en 4A à Polytech Marseille**

<br>

### **Présentation du projet**

Ce projet consiste en la création d’une application Web de gestion de l’émargement des étudiants du département Informatique aboutissant à la génération d’une feuille d’émargement au format PDF. Les fonctionnalités attendues sont : <br>
<br>
➔ la récupération du planning automatisée à partir du logiciel d’emploi du temps ADE <br>
➔ le stockage et la récupération du nom des élèves et de leur promotion à partir d’une BDD <br>
➔ la génération d’une feuille d’émargement au format PDF préremplie pour signature <br>

<br>

### **Lancement de l'application**

Pour développer ce projet, nous avons utilisé l'outil XAMPP / LAMPP pour le lancement simultané de Apache2 et MySQL. Voici les étapes à suivre dans l'attente d'un déploiement sur le serveur du département :

<br>

##### **Etape 1 : Préparation de l'environnement (dans l'attente d'un déploiement)**

1. Téléchargez XAMPP / LAMPP sur https://www.apachefriends.org/download.html
2. Déposez le projet dans "htdocs" du dossier téléchargé

<br>

##### **Etape 2 : Lancement des serveurs**

1. Ouvrez un terminal et entrez les commandes suivantes pour éviter tout conflit entre XAMPP et des serveurs préinstallés sur votre machine : <br>

```bash
$ sudo systemctl stop apache2
$ sudo systemctl stop mysql
```


2. Lancez XAMPP avec la commande correspondante à votre SE : <br>
- Linux : 
```bash
$ sudo /opt/lampp/lampp start
```
- MacOS
```bash
sudo /Applications/XAMPP/xamppfiles/xampp start
```
- Windows : 
```bash
C: \xampp\xampp_start.exe
```

<br>

##### **Etape 3 : Configuration de la BDD**

1. Entrez "localhost/phpmyadmin" dans votre navigateur
2. "New" > Database : nommez la nouvelle base "gestionnaireemargement" → "Go"
3. Cliquez sur "gestionnaireemargement" à gauche
→ cliquez sur "SQL" 
→ ctrl C + ctrl V du contenu du fichier database>gestionnaireemargement.sql du projet

<br>

##### **Etape 4 : Finalisation**

1. Entrez "localhost/gestionnaireemargement" dans votre navigateur <br>

**Bienvenue sur notre application gestionnaire d'émargement !**
