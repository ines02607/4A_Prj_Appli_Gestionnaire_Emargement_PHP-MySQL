<?php
require_once 'controller/MyController.php';
require_once "framework/Configuration.php";
require_once "framework/Tools.php";

// Définition de la classe ControllerSetup qui étend la classe MyController
class ControllerSetup extends MyController {

    /*Cette fonction est appelée par défaut lors de l'accès à la page du contrôleur.
    Elle appelle simplement la fonction install()*/
    public function index() : void {
        $this->install();
    }
    
    /*Cette fonction est chargée de créer et initialiser la base de données */

    public function install() : void {
        echo "<p>Importation des données en cours...</p>";
        try {
            // Récupération des paramètres de connexion à la base de données depuis la configuration.
            $webroot = Configuration::get("web_root");
            $dbtype = Configuration::get("dbtype");
            $dbhost = Configuration::get("dbhost");
            $dbname = Configuration::get("dbname");
            $dbuser = Configuration::get("dbuser");
            $dbpassword = Configuration::get("dbpassword");

            // Connexion à la base de données
            $pdo = new PDO("{$dbtype}:host={$dbhost};charset=utf8", $dbuser, $dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Récupération du script SQL de création de la base de données et exécution
            $sql = file_get_contents("database/{$dbname}.sql");
            $query = $pdo->prepare($sql);
            
             // Vérification du succès de l'exécution de la requête
            if($query->execute()) {
                echo "<p>La base de données a été correctement créée</p>";
            } else {
                echo "<p>Problème lors de la création de la base de données</p>";
            }
            
            // Si un fichier dump contenant des données existe, les données sont importées dans la base de données
            if(file_exists("database/{$dbname}_dump.sql")) {
                $sql = file_get_contents("database/{$dbname}_dump.sql");
                $query = $pdo->prepare($sql);

                // Vérification du succès de l'importation des données
                if($query->execute()) {
                    echo "<p>Les données correctement importées</p>";
                } else {
                    echo "<p>Problème lors de l'importation des données</p>";
                }
            }
            echo "<a href='{$webroot}'>Retour à l'index</a>";
        }
        // Gestion des exceptions
        catch (Exception $exc) {
            Tools::abort("Erreur lors de l'accès à la base de données : ".$exc->getMessage());
        }
        
    }

    /*Cette fonction est chargée d'exporter les données de la base de données dans un fichier dump SQL. */
    public function export() : void {
        echo "<p>Exportation des données en cours...</p>";
        
        // Récupération des paramètres nécessaires pour l'exportation des données depuis la configuration
        $mysql_path = Configuration::get("mysql_path");
        $webroot = Configuration::get("web_root");
        $dbhost = Configuration::get("dbhost");
        $dbname = Configuration::get("dbname");
        $dbuser = Configuration::get("dbuser");
        $dbpassword = Configuration::get("dbpassword");
        
        // Définition du chemin du fichier de dump SQL
        $file = dirname(__FILE__) . "/../database/{$dbname}_dump.sql"; 
        
        $output = [];
        // Exécution de la commande mysqldump pour exporter les données dans le fichier de dump SQL
        exec("{$mysql_path}mysqldump --user={$dbuser} --password={$dbpassword} --host={$dbhost} {$dbname} --result-file={$file} 2>&1", $output);
        // Vérification du succès de l'exportation des données
        if(count($output) == 0){
            echo "<p>Les données ont été importées dans le fichier `<code>{$file}</code>`</p>";
        } else {
            throw new Exception(json_encode($output));
        }
        echo "<a href='{$webroot}'>Retour à l'index</a>";
    }
}

