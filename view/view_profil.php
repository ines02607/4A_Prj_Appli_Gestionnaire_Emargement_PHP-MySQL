<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profil</title>
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
        
        <div class="title">Votre profil</div>
        <div class="main">
            <div>
                <form method="post" action="main/update_profil">
                    <div>
                        <label class="form_label" for="nom">Nom</label><br>
                        <input class="form_input" type="text" id="nom" name="nom" value="<?= $user->Nom_secretaire ?>" readonly>
                    </div>
                    <div>
                        <label class="form_label" for="prenom">Prénom</label><br>
                        <input class="form_input" type="text" id="prenom" name="prenom" value="<?= $user->Prenom_secretaire ?>" readonly>
                    </div>
                    <div>
                        <label class="form_label" for="identifiant">Identifiant</label><br>
                        <input class="form_input" type="text" id="identifiant" name="identifiant" value="<?= $user->Id_secretaire ?>" readonly>
                    </div>
                    <br>
                    <button type="submit" name="update_profil" value="mdp"> Modifier mon mot de passe</button>
                </form>
            </div>
        </div>
    </body>
</html>
