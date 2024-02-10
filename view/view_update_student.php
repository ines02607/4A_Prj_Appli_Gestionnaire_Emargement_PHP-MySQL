<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mettre à jour le profil d'un étudiant</title>
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
                cursor: not-allowed;
            }

            #form_label_textarea{
                display: inline-block;
                width: 30%; /* Ajustez la largeur selon vos besoins */
                margin-bottom: 10px;
                margin-top: 0px;
                font-weight: bold;
                text-align: left;
            }

            #form_input_textarea{
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
            <h2>Profil étudiant</h2>
            <div>
                <form method="post" action="main/update_student">
                    <div>
                        <label class="form_label" for="num">Numéro étudiant:</label>
                        <input class="form_input" type="text" id="num" name="num" value="<?= $student->Numero_etu ?>" readonly>
                    </div>
                    <div>
                        <label class="form_label" for="nom">Nom:</label>
                        <input class="form_input" type="text" id="nom" name="nom" value="<?= $student->Nom_etu ?>" readonly>
                    </div>
                    <div>
                        <label class="form_label" for="prenom">Prénom:</label>
                        <input class="form_input" type="text" id="prenom" name="prenom" value="<?= $student->Prenom_etu ?>" readonly>
                    </div>
                    <div>
                        <label id="form_label_textarea" for="prenom">Observations:</label>
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