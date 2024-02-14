<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mettre à jour le profil d'un étudiant</title>
        <base href="<?= $web_root ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/profil.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="header">
            <!-- Menu horizontal avec le logo à gauche -->
            <div class="menu">
                <!-- Chemin relatif vers le dossier "ressources/images" -->
                <div class="logo"><img src="ressources\images\logo_polytech_3.png"></div>
                <div class="barre_menu">
                <ul id="pages">
                    <li>
                        <form class="barre_menu_boutons" action="main/go_home" method="post">  
                            <button type="submit" name="accueil">ACCUEIL</button>
                        </form>
                    </li>
                    <li>
                        <form class="barre_menu_boutons" action="main/go_students_list" method="post">  
                            <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
                            <button type="submit" name="etudiants">LISTE</button>
                        </form> 
                    </li>
                    <li>
                        <form class="barre_menu_logo" action="main/actions_initiales" method="post">
                            <button id="profil" type="submit" name="initiales"><img src="ressources\images\icone_compte.png">
                            <!-- Ajout du name="initiales"<?= strtoupper(substr($user->Nom_secretaire, 0, 1) . substr($user->Prenom_secretaire, 0, 1)) ?>--></button>
                        </form>
                    </li>
                </ul>
                </div>
            </div>
        </div>
        
        <div class="title">Modification du profil de l'étudiant</div>
        <div class="main">
                <form method="post" action="main/update_student">
                    <div>
                        <label class="form_label" for="num">Numéro étudiant :</label>
                        <br>
                        <input class="form_input" type="text" id="num" name="num" value="<?= $student->Numero_etu ?>" readonly>
                    </div>
                    <div>
                        <label class="form_label" for="nom">Nom :</label>
                        <br>
                        <input class="form_input" type="text" id="nom" name="nom" value="<?= $student->Nom_etu ?>" readonly>
                    </div>
                    <div>
                        <label class="form_label" for="prenom">Prénom :</label>
                        <br>
                        <input class="form_input" type="text" id="prenom" name="prenom" value="<?= $student->Prenom_etu ?>" readonly>
                    </div>
                    <div>
                        <label class="form_label id="form_label_textarea" for="prenom">Observations :</label>
                        <br>
                        <textarea id="form_input_textarea" type="text" id="observation" name="observation"><?= $student->Observation_etu ?></textarea>
                    </div>
                    <br>
                    <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
                    <button type="submit" name="update_student" value="observation"> Enregister les modifications</button>
                </form>
            </div>
        </div>
    </body>
</html>
