
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Accueil</title>
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
		                <form class="profil" action="main/actions_initiales" method="post">
		                    <button id="profil" type="submit" name="initiales"><img src="ressources\images\icone_compte.png"></button>
		                <!--<?= strtoupper(substr($user->Nom_secretaire, 0, 1) . substr($user->Prenom_secretaire, 0, 1)) ?>--> 
		                 
		                </form>
		            </li>
		        </ul>
                </div>
            </div>
    </div>
</div>

    <div class="main">
        <!-- Texte de bienvenue -->
        <div class="titre">Bonjour <span id="Nom_secretaire"><?= $user->Prenom_secretaire ?> !</span>
        <br>Bienvenue dans votre gestionnaire d’émargement.
        </div>

	<div id="main">
		<!-- Phrase et choix de promotion -->
		<p>Veuillez choisir une promotion :</p>
		<form action="main/choose_promotion" method="post" >
		    <button class="bouton" type="submit" name="promotion" value="3A">3A</button>
		    <button class="bouton" type="submit" name="promotion" value="4A">4A</button>
		    <button class="bouton" type="submit" name="promotion" value="5A">5A</button>
		</form>
        </div>
    </div>
    </body>
</html>
