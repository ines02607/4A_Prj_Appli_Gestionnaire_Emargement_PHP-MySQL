<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modifier le mot de passe</title>
        <base href="<?= $web_root ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/profil.css" rel="stylesheet" type="text/css"/>
        <style>

            

        </style>
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
                        <form class="barre_menu_logo" action="main/actions_initiales" method="post">
                            <button id="profil" type="submit" name="initiales"><img src="ressources\images\icone_compte.png">
                            <!-- Ajout du name="initiales"<?= strtoupper(substr($user->Nom_secretaire, 0, 1) . substr($user->Prenom_secretaire, 0, 1)) ?>--></button>
                        </form>
                    </li>
                </ul>
                </div>
            </div>
        </div>
        
        <div class="title">Modification de votre mot de passe</div>
        <div class="main">
            <div>
                <form method="post" action="main/update_password">
                    <div>
                        <label class="form_label" for="ancien_mot_de_passe">Ancien mot de passe :</label><br>
                        <input id="input_amdp" type="password"  name="ancien_mot_de_passe" required>
                    </div>
                    <div class="error">
                        <?php if (isset($errors['ancien_mot_de_passe'])) echo $errors['ancien_mot_de_passe']; ?>
                    </div>
                    <div>
                        <label class="form_label" for="nouveau_mot_de_passe">Nouveau mot de passe :</label><br>
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
                        <label class="form_label" for="confirmation_mot_de_passe">Confirmation du mot de passe :</label><br>
                        <input id="input_cmdp" type="password" id="confirmation_mot_de_passe" name="confirmation_mot_de_passe" required>
                    </div>
                    <div class="error">
                        <?php if (isset($errors['confirmation_mot_de_passe'])) echo $errors['confirmation_mot_de_passe']; ?>
                    </div>
                    <br>
                                    
                    <button type="submit" name="update_mdp" value="mdp">Enregistrer mon mot de passe</button>
                </form>
            </div>
        </div>
    </body>
</html>
