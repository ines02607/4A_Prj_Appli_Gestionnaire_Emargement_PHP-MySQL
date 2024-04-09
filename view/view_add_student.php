<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profil</title>
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
        
        <div class="title">Ajout d'un nouvel étudiant</div>
        <div class="main">
            <div>
                <form method="post" action="main/add_student ">
                    <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
                    <div>
                        <label class="form_label" for="num">Numéro étudiant :</label>
                        <br>
                        <input class="form_input_add"  type="text" id="num" name="num" required>
                    </div>
                    <div class="error">
                        <?php if (isset($errors['Numero_etu'])) echo $errors['Numero_etu']; ?>
                    </div>
                    <div>
                        <label class="form_label" for="nom">Nom :</label><br>
                        <input class="form_input_add" type="text" id="nom" name="nom" required>
                    </div>
                    <div class="error">
                        <?php if (isset($errors['Nom_etu'])) echo $errors['Nom_etu']; ?>
                    </div>
                    <div>
                        <label class="form_label" for="prenom">Prénom :</label><br>
                        <input class="form_input_add" type="text" id="prenom" name="prenom" required>
                    </div>
                    <div class="error">
                        <?php if (isset($errors['Prenom_etu'])) echo $errors['Prenom_etu']; ?>
                    </div>
                    <br>
                    <button type="submit" name="add_to_list" value="mdp">Ajouter à la liste</button>
                </form>
            </div>
        </div>
    </body>
</html>
