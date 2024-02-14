
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Services</title>
    <base href="<?= $web_root ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/sous_promo.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="header">
        <!-- Menu horizontal avec le logo à gauche -->
        <div class="menu">
            <!-- Chemin relatif vers le dossier "ressources/images" -->
            <div class="logo"><img src="ressources\images\logo_polytech_3.png"></div>
            <div class="barre_menu2">
            <ul id="pages">
                <li>
                    <form class="barre_menu_boutons" action="main/go_home" method="post">  
                        <button type="submit" name="accueil">ACCUEIL</button>
                    </form>
                </li>
                <li>
                    <form class="barre_menu_boutons" action="main/go_sous_promotion" method="post">
                        <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
                        <button type="submit"name="promotions">SOUS-PROMOTIONS</button>
                    </form>
                </li>
                <!--<li>
                    <form action="main/go_services" method="post">
                        <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
                        <button type="submit" name="services">Services</button>
                    </form>
                </li>-->
                <li>
                    <form action="main/actions_initiales" method="post">
                        <button id="profil" type="submit" name="initiales"><img src="ressources\images\icone_compte.png"></button>
                        <!-- Ajout du name="initiales" <?= strtoupper(substr($user->Nom_secretaire, 0, 1) . substr($user->Prenom_secretaire, 0, 1)) ?>-->
                    </form>
                </li>
            </ul>
            </div>
        </div>
</div>

    <div class="main">
         <!-- Phrase et choix de la sous promotion -->
        <p>Vous souhaitez consulter :</p>
        
        <form method="POST" action="main/choose_service">
            <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
            <button type="submit" name="service" value="planning">L'emploi du temps</button>
            <button type="submit" name="service" value="etudiants">La liste des étudiants</button>
        </form>
    </div>
</body>
</html>
