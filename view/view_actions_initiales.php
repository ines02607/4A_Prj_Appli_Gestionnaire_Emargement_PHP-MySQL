
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Action initiales</title>
        <base href="<?= $web_root ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/home.css" rel="stylesheet" type="text/css"/>
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
                </ul>
                </div>
            </div>
        </div>

        <div class="main">
        <div class="titre">Bienvenue sur votre espace, <span id="Nom_secretaire"><?= $user->Prenom_secretaire ?>.</span>
        <br>
        </div>

	<div id="main">
		<!-- Phrase et choix de promotion -->
		<p>Que souhaitez vous faire ?</p>
		<form action="main/choose_actions_initiales" method="post">
                     <button type="submit" name="actions_initiales" value="profil">
                     Mes informations</button>
                <div id="deco">
                     <button type="submit" name="actions_initiales" value="déconnexion" class="logout_bouton"><a href="main/logout">Déconnexion</a></button>
                </div>
                </form>
        </div>
        </div>
    </body>
</html>
