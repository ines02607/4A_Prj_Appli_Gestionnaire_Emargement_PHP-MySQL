<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profil</title>
        <base href="<?= $web_root ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/profil.css" rel="stylesheet" type="text/css"/>
        <style>
            h2{
                text-align: center;
            }
            table{
                margin: auto;
            }
            .logo{
                width: 40%;
            }
            #pages{
                align-items: right;
                display: flex;
                width: 60%;
                text-align: center;
            }
            #pages button{
                width:100%;
            }
            #profil{
                margin-right: 0px;
            }
            
            .error {
                color: red;
            }

            .form_label {
                display: inline-block;
                width: 30%; /* Ajustez la largeur selon vos besoins */
                margin-bottom: 10px;
                font-weight: bold;
                text-align: left;
            }

            .form_input{
                display: inline-block;
                width: 40%; /* Ajustez la largeur selon vos besoins */
                padding: 8px;
                margin-bottom: 20px;
                border: 2px solid #063f6d; /* Couleur bleue pour la bordure */
                border-radius: 10px; /* Bords arrondis */
                box-sizing: border-box;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <!-- Menu horizontal avec le logo à gauche -->
            <div class="menu">
                <!-- Chemin relatif vers le dossier "ressources/images" -->
                <div class="logo"><img src="ressources\images\logo_polytech_3.png"></div>
                <ul id="pages">
                    <li>
                        <form action="main/go_home" method="post">  
                            <button type="submit" name="accueil">Accueil</button>
                        </form>
                    </li>
                    <li>
                        <form action="main/go_students_list" method="post">  
                            <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
                            <button type="submit" name="etudiants">Liste des étudiants</button>
                        </form>    
                    <li>
                    <li>
                        <form action="main/actions_initiales" method="post">
                            <button id="profil" type="submit" name="initiales"> <!-- Ajout du name="initiales" -->
                                <?= strtoupper(substr($user->Nom_secretaire, 0, 1) . substr($user->Prenom_secretaire, 0, 1)) ?>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="main">
            <h2>Ajouter un nouvel étudiant</h2>
            <br>
            <div>
                <form method="post" action="main/add_student ">
                    <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
                    <div>
                        <label class="form_label" for="num">Numéro étudiant:</label>
                        <input class="form_input"  type="text" id="num" name="num" required>
                    </div>
                    <div class="error">
                        <?php if (isset($errors['Numero_etu'])) echo $errors['Numero_etu']; ?>
                    </div>
                    <div>
                        <label class="form_label" for="nom">Nom:</label>
                        <input class="form_input" type="text" id="nom" name="nom" required>
                    </div>
                    <div class="error">
                        <?php if (isset($errors['Nom_etu'])) echo $errors['Nom_etu']; ?>
                    </div>
                    <div>
                        <label class="form_label" for="prenom">Prénom:</label>
                        <input class="form_input" type="text" id="prenom" name="prenom" required>
                    </div>
                    <div class="error">
                        <?php if (isset($errors['Prenom_etu'])) echo $errors['Prenom_etu']; ?>
                    </div>
                    <br>
                    <button type="submit" name="add_to_list" value="mdp"> Ajouter à la liste</button>
                </form>
            </div>
        </div>
    </body>
</html>