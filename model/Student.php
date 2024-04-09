<?php

require_once "framework/Model.php";


// Définition de la classe Student qui étend la classe Model
class Student extends Model {

    // constructeur d'un étudiant
    public function __construct(
         
        public string $Numero_etu, 
        public string $Nom_etu,
        public string $Prenom_etu,
        public string $Signature_etu,
        public string $Heure_arrivee_etu,
        public string $Observation_etu,
        public string $Promo_etu
        ){  

    }
    /*Récupère un étudiant par son numéro étudiant */
    public static function get_student_by_num(string $Numero_etu) : Student|false {
        $query = self::execute("SELECT * FROM Etudiant where Numero_etu = :Numero_etu", ["Numero_etu"=>$Numero_etu]);
        $data = $query->fetch(); 
        if ($query->rowCount() ==0) {
            return false ;
        } else{
            return new Student( $data["Numero_etu"], $data["Nom_etu"], $data["Prenom_etu"], $data["Signature_etu"], $data["Heure_arrivee_etu"], $data["Observation_etu"],$data["Promo_etu"]);
        }
    }

    /*Récupère un étudiant par son nom */
    public static function get_student_by_nom(string $Nom_etu) : Student|false {
        $query = self::execute("SELECT * FROM Etudiant where Nom_etu = :Nom_etu", ["Nom_etu"=>$Nom_etu]);
        $data = $query->fetch(); 
        if ($query->rowCount() ==0) {
            return false ;
        } else{
            return new Student( $data["Numero_etu"], $data["Nom_etu"], $data["Prenom_etu"], $data["Signature_etu"], $data["Heure_arrivee_etu"], $data["Observation_etu"],$data["Promo_etu"]);
        }
    }

    /*Récupère un étudiant par son prénom */ 
    public static function get_student_by_prenom(string $Prenom_etu) : Student|false {
        $query = self::execute("SELECT * FROM Etudiant where Prenom_etu = :Prenom_etu", ["Prenom_etu"=>$Prenom_etu]);
        $data = $query->fetch(); 
        if ($query->rowCount() ==0) {
            return false ;
        } else{
            return new Student( $data["Numero_etu"], $data["Nom_etu"], $data["Prenom_etu"], $data["Signature_etu"], $data["Heure_arrivee_etu"], $data["Observation_etu"],$data["Promo_etu"]);
        }
    }
    
    /* recupere tout les etudiant de la sous promotion */

    public static function get_students_of_subpromotion($subpromotion) : array {
        $query = self::execute("SELECT * FROM Etudiant where Promo_etu = :Promo_etu ORDER BY Nom_etu", ["Promo_etu"=>$subpromotion]);

        $data = $query->fetchAll();

        $results = [];
        foreach ($data as $row) {
            $results[] = new Student( $row["Numero_etu"], $row["Nom_etu"], $row["Prenom_etu"], $row["Signature_etu"], $row["Heure_arrivee_etu"], $row["Observation_etu"],$row["Promo_etu"]);
        }

        return $results;
    }

    /*Supprime un étudiant par son numéro étudiant */
    public static function delete_student_by_num(string $student_num) {
        self::execute("DELETE FROM Etudiant WHERE Numero_etu = :Numero_etu", ["Numero_etu" => $student_num]);
    }

    /*Ajoute un nouvel étudiant dans les attributs sont passés en paramètre */
    public static function add_student(string $Numero_etu, string $Nom_etu, string $Prenom_etu, string $Signature_etu, string $Heure_arrivee_etu, string $Observation_etu, string $Promo_etu) {
        $errors = [];

        // Vérifier si le numéro étudiant est un nombre
        if (!is_numeric($Numero_etu)) {
            $errors['Numero_etu'] = "Le numéro étudiant doit être un nombre.";
        }

        // Vérifier si le numéro étudiant est unique dans la base de données
        $existing_student = self::get_student_by_num($Numero_etu);
        if ($existing_student) {
            $errors['Numero_etu'] = "Ce numéro étudiant existe déjà.";
        }

        // Vérifier si le nom et prénom sont des chaînes de caractères
        if (!is_string($Nom_etu)) {
            $errors['Nom_etu'] = "Le nom doit être une chaîne de caractères.";
        }

        if (!is_string($Prenom_etu)) {
            $errors['Prenom_etu'] = "Le prénomnom doit être une chaîne de caractères.";
        }

        // Si aucune erreur n'est survenue, ajoutez l'étudiant à la base de données
        if (empty($errors)) {
            // Code pour insérer l'étudiant dans la base de données
            $query = self::execute("INSERT INTO Etudiant (Numero_etu, Nom_etu, Prenom_etu, Signature_etu, Heure_arrivee_etu, Observation_etu, Promo_etu) VALUES (:Numero_etu, :Nom_etu, :Prenom_etu, :Signature_etu, :Heure_arrivee_etu, :Observation_etu, :Promo_etu)", [
                "Numero_etu" => $Numero_etu,
                "Nom_etu" => $Nom_etu,
                "Prenom_etu" => $Prenom_etu,
                "Signature_etu" => $Signature_etu,
                "Heure_arrivee_etu" => $Heure_arrivee_etu,
                "Observation_etu" => $Observation_etu,
                "Promo_etu" => $Promo_etu
            ]);
        }

        return $errors;
    
    }
    
    

    /*Met à jour les informations d'un étudiant dont le numéro est passé en paramètre */
    public function update(string $Numero, string $Observation) : Student {
        $this->Numero_etu = $Numero;
        $this->Observation_etu = $Observation;

        if($this->Numero_etu != null){
            self::execute("UPDATE Etudiant SET Observation_etu=:Observation_etu WHERE Numero_etu=:Numero_etu ", 
                            [
                                "Numero_etu"=>$this->Numero_etu,
                                "Observation_etu"=>$this->Observation_etu
                            ]);
        }
        return $this ;
    }    
}
