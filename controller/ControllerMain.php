<?php
require_once 'model/User.php';
require_once 'model/Student.php';
require_once 'framework/View.php';
require_once 'controller/MyController.php';
require_once 'autoload.php';
require_once 'vendor/setasign/fpdf/fpdf.php';
require_once 'vendor/johngrogg/ics-parser/src/ICal/ICal.php';
require_once 'vendor/johngrogg/ics-parser/src/ICal/Event.php';

use ICal\ICal;

class ControllerMain extends Controller {

    public $subpromotion;
    

    public function index() : void {
        $errors = [] ;

        if($this->user_logged()){
            $user = $this->get_user_or_false();
            $this->redirect("Home","yourHome");
        }
        else{
        (new View("login"))->show(["Identifiant" => "", "Mot de passe" =>"","errors"=>$errors]);
        }
    }
 
    public function login() : void {
        
            $Identifiant = "";
            $Mot_de_passe = ''; 
            $errors = [] ;

            if (isset($_POST['Identifiant']) && isset($_POST['Mot_de_passe'])) { 
                
                $Identifiant = Tools::sanitize($_POST['Identifiant']);
                $Mot_de_passe = Tools::sanitize($_POST['Mot_de_passe']);
                $errors = User::validate_login($Identifiant , $Mot_de_passe);


                If (empty($errors)){
                    echo "connexion réussie";
                    $this->log_user(User::get_user_by_id($Identifiant));
                }

             }

             (new View("login"))->show(["Identifiant" => $Identifiant, "Mot de passe" => $Mot_de_passe, "errors"=>$errors]);
    }

    

    public function choose_promotion(){
        if (isset($_POST['promotion'])){
            $promotion = Tools::sanitize($_POST['promotion']);
            $user = $this->get_user_or_redirect();
            if($promotion == "3A"){
                (new View("sous_promo_3A"))->show(["user" => $user]);
            }
            if($promotion == "4A"){
                (new View("services"))->show(["user" => $user,"subpromotion" => $promotion]);
            }
            if($promotion == "5A"){
                (new View("sous_promo_5A"))->show(["user" => $user]);
            }
        }
    }

    public function choose_subpromotion(){
        $user = $this->get_user_or_redirect();
        if (isset($_POST['subpromotion'])){
            $subpromotion = $_POST['subpromotion']; 
            (new View("services"))->show(["user" => $user,"subpromotion" => $subpromotion]);
        
        }
    }

    function calculate_dates() {
        // Récupérer la date actuelle
        $current_date = new DateTime();
    
        // Calculer le jour de la semaine (0 pour dimanche, 6 pour samedi)
        $current_day_of_week = $current_date->format('w');
    
        // Initialiser les variables pour les dates firstDate et lastDate
        $firstDate = '';
        $lastDate = '';
    
        // Si c'est samedi ou dimanche, firstDate sera le lundi suivant
        if ($current_day_of_week == 6 || $current_day_of_week == 0) {
            $firstDate = $current_date->modify('next Monday')->format('Y-m-d');
            $lastDate = $current_date->modify('next Friday')->format('Y-m-d');
        } else {
            // Sinon, firstDate sera le lundi précédent
            $firstDate = $current_date->modify('last Monday')->format('Y-m-d');
    
            // lastDate sera le vendredi suivant
            $lastDate = $current_date->modify('next Friday')->format('Y-m-d');
        }
    
        // Retourner les dates calculées
        return array('firstDate' => $firstDate, 'lastDate' => $lastDate);
    }

    
    function get_planning($subpromotion) {

        // Calculer les dates firstDate et lastDate
        $dates = $this->calculate_dates();

        if($subpromotion == "3A FISA"){
            $url='https://ade-web-consult.univ-amu.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?projectId=8&resources=46050&calType=ical&firstDate='. $dates['firstDate'] . '&lastDate=' . $dates['lastDate'];
        }
        if($subpromotion == "3A FISE"){ 
            $url='https://ade-web-consult.univ-amu.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?projectId=8&resources=46049&calType=ical&firstDate='. $dates['firstDate'] . '&lastDate=' . $dates['lastDate'];
            //$url='https://ade-web-consult.univ-amu.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?projectId=8&resources=46049&calType=ical&firstDate=2024-02-12&lastDate=2024-02-16';
        }
        if($subpromotion == "4A"){
            $url ='https://ade-web-consult.univ-amu.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?projectId=8&resources=3929&calType=ical&firstDate=' . $dates['firstDate'] . '&lastDate=' . $dates['lastDate'];
        }
        if($subpromotion == "5A INSI"){
            $url='https://ade-web-consult.univ-amu.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?projectId=8&resources=4152&calType=ical&firstDate=' . $dates['firstDate'] . '&lastDate=' . $dates['lastDate'];
        }
        if($subpromotion == "5A REVA"){
            $url='https://ade-web-consult.univ-amu.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?projectId=8&resources=3954&calType=ical&firstDate=' . $dates['firstDate'] . '&lastDate=' . $dates['lastDate'];
        }

        // Utiliser les dates calculées pour construire l'URL dynamique
        //$url = 'https://ade-web-consult.univ-amu.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?projectId=8&resources=3929&calType=ical&firstDate=' . $dates['firstDate'] . '&lastDate=' . $dates['lastDate'];
        
        // Télécharger le fichier ICalendar
        $icalData = file_get_contents($url);
    
        // Vérifier si le téléchargement a réussi
        if ($icalData === false) {
            return "Erreur lors du téléchargement du fichier ICalendar.";
        }
    
        // Parser le fichier ICalendar
        try {
            $calendar = new ICal($icalData);
            $events = $calendar->events();
            
        } catch (\Exception $e) {
            return "Erreur lors du parsing du fichier ICalendar: " . $e->getMessage();
        }
    
        $evenements = [];
    
        // Parcourir les événements
        foreach ($events as $event) {
            $evenements[] = [
                'summary' => $event->summary,
                'start' => $event->dtstart,
                'end' => $event->dtend,
                // Ajoutez d'autres propriétés si nécessaire
            ];
        }
        // Afficher les événements
        //print_r($evenements);
        // Trier les événements par date de début
        usort($evenements, function($a, $b) {
            return strtotime($a['start']) - strtotime($b['start']);
        });

        return $evenements;
    }
    


    public function choose_service(){
        $user = $this->get_user_or_redirect();

        if (isset($_POST['service'] ) && isset($_POST['subpromotion'])){
            $service = $_POST['service']; 
            $subpromotion = $_POST['subpromotion'];
            $students = Student::get_students_of_subpromotion($subpromotion);

            if($service == "etudiants"){
                
                (new View("students_list"))->show(["user" => $user,"subpromotion" => $subpromotion,"students" => $students ]);
            }
            if($service == "planning"){
                $evenments = $this->get_planning($subpromotion);
                (new View("students_planning"))->show(["user" => $user,"subpromotion" => $subpromotion,"students" => $students,"evenments" => $evenments]);
            }
        }
    }
  
    public function generate_pdf() {
    	ob_start();
        // Récupérer les données des étudiants
        if (isset($_POST['subpromotion']) && isset($_POST['generation'])) {
            $subpromotion = $_POST['subpromotion'];
    
            // Récupérer les données des étudiants
            $students = Student::get_students_of_subpromotion($subpromotion);
    
            // Utiliser la bibliothèque FPDF pour créer un nouveau document PDF
            $pdf = new FPDF();
            $pdf->AddPage();
    
            // Ajouter un en-tête avec le nom de la promotion (subpromotion) et la date du jour
            $pdf->SetFont('Arial', 'B', 14);
            $pdf->Cell(0, 10, 'Promotion: ' . $subpromotion, 0, 1, 'C');
            $pdf->Ln(); // Saut de ligne

            // Ajouter le logo en haut à droite du PDF
            $pdf->Image('ressources/images/logo_polytech_2.png', 10, 10, 30);

            // Ajouter un autre logo en haut à droite si la sous-promotion est "3A FISA"
            if ($subpromotion == "3A FISA") {
                $pdf->Image('ressources/images/logo_cfai.png', 170, 0, 30);
            }

            // Déplacer le curseur en bas à gauche du logo
            $pdf->SetY(25); // 10 (hauteur du logo) + 30 (hauteur de l'image) + 2 (marge)

            // Définir une police de caractères pour le contenu du tableau
            

            // Texte sous le logo
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(0, 7, utf8_decode('Lieu de la formation: Département Informatique - Luminy'), 0, 1);
            
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(0, 7, utf8_decode('Intitulé de la formation: Ingénieur en Informatique'), 0, 1);
            
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(0, 7, 'Emargement du: ' . date('Y-m-d'), 0, 1);
            $pdf->Ln(5); // Saut de ligne

    
            // Créer un tableau pour afficher les données des étudiants avec des bordures
            // Entêtes
            $pdf->SetFont('Arial', '', 10);
            $pdf->SetFillColor(200, 220, 255); // Couleur de fond pour les en-têtes
            $pdf->SetTextColor(0); // Couleur de texte pour les en-têtes
            $pdf->Cell(8, 10, utf8_decode('N°'), 1, 0, 'C', true);
            //$pdf->Cell(20, 10, utf8_decode('Numéro'), 1, 0, 'C', true);
            $pdf->Cell(50, 10, 'Nom', 1, 0, 'C', true);
            $pdf->Cell(30, 10, utf8_decode('Prénom'), 1, 0, 'C', true);
            $pdf->Cell(30, 10, 'Signature', 1, 0, 'C', true);
            $pdf->Cell(25, 10, utf8_decode('Heure d\'arrivée'), 1, 0, 'C', true);
            $pdf->Cell(50, 10, 'Observation', 1, 0, 'C', true);
            $pdf->Ln(); // Saut de ligne
    
            // Ajouter les données des étudiants au PDF
            $i = 1;
            foreach ($students as $student) {
                $pdf->Cell(8, 10, $i++, 1); 
                //$pdf->Cell(20, 10, $student->Numero_etu, 1);
                $pdf->Cell(50, 10, utf8_decode($student->Nom_etu), 1);
                $pdf->Cell(30, 10, utf8_decode($student->Prenom_etu), 1);
                $pdf->Cell(30, 10, $student->Signature_etu, 1);
                $pdf->Cell(25, 10, $student->Heure_arrivee_etu, 1);
                $pdf->Cell(50, 10, utf8_decode(''), 1);
                $pdf->Ln(); // Saut de ligne
            }
            //Ajouter les lignes supplémentaires en bas du tableau
            $pdf->Ln(5); // Saut de ligne
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(0, 10, 'Cours de: ...................................................                                                                         Signature', 0, 1);
            $pdf->Cell(0, 10, 'Enseignant(e) : ..........................................', 0, 1);
            // Sortie du document PDF dans le navigateur
            ob_end_clean(); 
            $pdf->Output('liste.pdf', 'I');
        }
    }
    
    public function actions_initiales(){
        $user = $this->get_user_or_redirect();
        if (isset($_POST['initiales'])){
            (new View("actions_initiales"))->show(["user" => $user]);
        }
    }
    
    public function choose_actions_initiales(){
        if (isset($_POST['actions_initiales'])){
            $user = $this->get_user_or_redirect();
            $actions_initiales = $_POST['actions_initiales']; 

            if($actions_initiales == "profil"){
                (new View("profil"))->show(["user" => $user]);
            }
            if($actions_initiales == "déconnexion"){
                (new View("login"))->show();
            }    
        }
    }

    public function update_profil(){
        if (isset($_POST['update_profil'])){
            $update_profil = $_POST['update_profil']; 

            if($update_profil == "mdp"){
                $user = $this->get_user_or_redirect();
                (new View("update_mdp"))->show(["user" => $user]);
            }
        }
    }
            
    

    public function update_password() : void {
        $user = $this->get_user_or_redirect();
        $errors = [];
    
        if (isset($_POST['ancien_mot_de_passe'], $_POST['nouveau_mot_de_passe'], $_POST['confirmation_mot_de_passe'])) {
            $ancienMotDePasse = Tools::sanitize($_POST['ancien_mot_de_passe']);
            $nouveauMotDePasse = Tools::sanitize($_POST['nouveau_mot_de_passe']);
            $confirmationMotDePasse = Tools::sanitize($_POST['confirmation_mot_de_passe']);
    
            $errors = $user->update_mdp($ancienMotDePasse, $nouveauMotDePasse, $confirmationMotDePasse);
            if (empty($errors)) {
                // Afficher une alerte JavaScript pour indiquer que le mot de passe a été modifié
                echo '<script type="text/javascript"> window.onload = function () { alert("Votre mot de passe a été modifié."); } </script>';
                (new View("login"))->show(["Identifiant" => "", "Mot de passe" =>"","errors"=>$errors]);
            }
            else{
                (new View("update_mdp"))->show(["user" => $user, "errors" => $errors]);

            }
        }
    }
    
    public function delete_student() {
        // Vérifier si l'utilisateur est connecté
        $user = $this->get_user_or_redirect();
    
        // Vérifier si l'action est correcte
        if (isset($_POST['action'])  &&  $_POST['action'] == 'delete') {
            // Vérifier si l'ID de l'étudiant à supprimer est défini
            if (isset($_POST['student_num'])) {
                $student_num = Tools::sanitize($_POST['student_num']);
                $subpromotion = Tools::sanitize($_POST['subpromotion']);
                // Supprimer l'étudiant
                Student::delete_student_by_num($student_num);
                $students = Student::get_students_of_subpromotion($subpromotion);
                // Afficher une alerte JavaScript pour indiquer que l'étudiant a été supprimé
                echo '<script type="text/javascript"> window.onload = function () { alert("L\'étudiant a été supprimé."); } </script>';
                // Rediriger vers la page de liste des étudiants 
                (new View("students_list"))->show(["user" => $user,"subpromotion" => $subpromotion,"students" => $students ]);

            }
        }
    }

    public function add_student_form(){
        $user = $this->get_user_or_redirect();
        $subpromotion = $_POST['subpromotion'];
        (new View("add_student"))->show(["user" => $user, "subpromotion" => $subpromotion]);
    }

    public function add_student() {
        $user = $this->get_user_or_redirect();
        
        if (isset($_POST['add_to_list'])) {
            $Numero_etu = $_POST['num'];
            $Nom_etu = $_POST['nom'];
            $Prenom_etu = $_POST['prenom'];
            $Signature_etu = '';
            $Heure_arrivee_etu = '';
            $Observation_etu = '';
            $Promo_etu = $_POST['subpromotion']; 
            
            $errors = Student::add_student($Numero_etu, $Nom_etu, $Prenom_etu, $Signature_etu, $Heure_arrivee_etu, $Observation_etu, $Promo_etu);
    
            // Si aucune erreur n'est trouvée, ajoutez l'étudiant
            if (empty($errors)) {
                echo '<script type="text/javascript"> window.onload = function () { alert("Le nouvel étudiant a été bien ajouté."); } </script>';
                // Rediriger vers la page de liste des étudiants 
                $students = Student::get_students_of_subpromotion($Promo_etu);
                (new View("students_list"))->show(["user" => $user,"subpromotion" => $Promo_etu,"students" => $students ]);
            } else {
                // Affichez la vue avec les erreurs
                (new View("add_student"))->show(["user" => $user, "errors" => $errors]);
            }
        }
    }

    public function update_student() : void {
        $user = $this->get_user_or_redirect();
    
        if (isset($_POST['observation'])) {
            $Observation_etu = $_POST['observation'];
            $Numero_etu = $_POST['num'];
            $subpromotion = $_POST['subpromotion'];
            $student = Student::get_student_by_num($Numero_etu);

            $student = $student->update($Numero_etu, $Observation_etu);
            $students = Student::get_students_of_subpromotion($subpromotion);
            
            // Afficher une alerte JavaScript pour indiquer que le mot de passe a été modifié
            echo '<script type="text/javascript"> window.onload = function () { alert("Les modifiactions ont été bien enregistrées."); } </script>';
            
            (new View("students_list"))->show(["user" => $user,"subpromotion" => $subpromotion,"students" => $students]);

            
        }
    }

    public function action(){
        if(isset($_POST['action'])){
            $value =$_POST['action'];
            
            if($value == "delete"){
                $this->delete_student();
            }
            if($value == "update"){
                $this->go_to_update_student();
            }

        }
    }
    
    /************************ Redirections *********************************************************************/
    public function go_home(){
        $user = $this->get_user_or_redirect();
        (new View("home"))->show(["user" => $user]);
    }

    public function go_sous_promo_3A(){
        $user = $this->get_user_or_redirect();
        (new View("sous_promo_3A"))->show(["user" => $user]);
        
    }

    public function go_sous_promo_5A(){
        $user = $this->get_user_or_redirect();
        (new View("sous_promo_5A"))->show(["user" => $user]);
        
        //(new View("services"))->show(["user" => $user,"subpromotion" => $promotion]);
    }

    public function go_services(){
        $user = $this->get_user_or_redirect();
        $promotion = $_POST['subpromotion'];
        (new View("services"))->show(["user" => $user,"subpromotion" => $promotion]);
    }

    public function go_planning(){
        $user = $this->get_user_or_redirect();
        $subpromotion = $_POST['subpromotion'];
        $evenments = $this->get_planning($subpromotion);
        $students = Student::get_students_of_subpromotion($subpromotion);
        (new View("students_planning"))->show(["user" => $user,"subpromotion" => $subpromotion,"students" => $students,"evenments" => $evenments]);
    }

    public function go_students_list(){
        $user = $this->get_user_or_redirect();
        $subpromotion = $_POST['subpromotion'];
        $students = Student::get_students_of_subpromotion($subpromotion);
        (new View("students_list"))->show(["user" => $user,"subpromotion" => $subpromotion,"students" => $students ]);
    
    }

    public function go_sous_promotion(){
        $user = $this->get_user_or_redirect();
        $subpromotion = $_POST['subpromotion'];
        
        if(($subpromotion == "3A FISE") || ($subpromotion == "3A FISA") ){
            (new View("sous_promo_3A"))->show(["user" => $user]);
        }
        if($subpromotion == "4A"){
            (new View("home"))->show(["user" => $user]);
        }
        if(($subpromotion == "5A INSI") || ($subpromotion == "5A REVA")){
            (new View("sous_promo_5A"))->show(["user" => $user]);
        }
        
    }

    public function go_to_update_student(){
        $user = $this->get_user_or_redirect();
        $subpromotion = $_POST['subpromotion'];
        $Numero_etu = $_POST['student_num'];
        $student = Student::get_student_by_num($Numero_etu);
        $students = Student::get_students_of_subpromotion($subpromotion);
        (new View("update_student"))->show(["user" => $user,"subpromotion" => $subpromotion,"students" => $students,"student" => $student ]);
    
    }
    
 }
