<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modifier le mot de passe</title>
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
            .form_input[type="text"] {
                display: inline-block;
                width: 40%; /* Ajustez la largeur selon vos besoins */
                padding: 8px;
                margin-bottom: 20px;
                border: 2px solid #063f6d; /* Couleur bleue pour la bordure */
                border-radius: 10px; /* Bords arrondis */
                box-sizing: border-box;
            }

            #input_amdp, #input_nmdp, #input_cmdp{
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
            <h2>Modifier votre mot de passe</h2>
            <br>
            <div>
                <form method="post" action="main/update_password">
                    <div>
                        <label class="form_label" for="ancien_mot_de_passe">Ancien mot de passe:</label>
                        <input id="input_amdp" type="password"  name="ancien_mot_de_passe" required>
                    </div>
                    <div class="error">
                        <?php if (isset($errors['ancien_mot_de_passe'])) echo $errors['ancien_mot_de_passe']; ?>
                    </div>
                    <div>
                        <label class="form_label" for="nouveau_mot_de_passe">Nouveau mot de passe:</label>
                        <input id="input_nmdp" type="password" id="nouveau_mot_de_passe" name="nouveau_mot_de_passe" required>
                    </div>
                    <div class="error">
                        <?php if (isset($errors['nouveau_mot_de_passe'])): ?>
                            <ul>
                                <?php foreach ($errors['nouveau_mot_de_passe'] as $error): ?>
                                    <li><?= $error ?></li><br>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="form_label" for="confirmation_mot_de_passe">Confirmation du mot de passe:</label>
                        <input id="input_cmdp" type="password" id="confirmation_mot_de_passe" name="confirmation_mot_de_passe" required>
                    </div>
                    <div class="error">
                        <?php if (isset($errors['confirmation_mot_de_passe'])) echo $errors['confirmation_mot_de_passe']; ?>
                    </div>
                                    
                    <button type="submit" name="update_mdp" value="mdp"> Enregistrer mon mot de passe</button>
                </form>
            </div>
        </div>
    </body>
</html>