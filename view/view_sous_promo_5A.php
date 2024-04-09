
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sous promotion 5A</title>
    <base href="<?= $web_root ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/sous_promo.css" rel="stylesheet" type="text/css"/>
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
                    <!--<li><form action="main/go_sous_promo_5A" method="post">
                        <button type="submit" name="promotions">Sous promotions</button>
                    </form></li>-->
                <li>
                    <form action="main/actions_initiales" method="post">
                        <button id="profil" type="submit" name="initiales"> <!-- Ajout du name="initiales"<?= strtoupper(substr($user->Nom_secretaire, 0, 1) . substr($user->Prenom_secretaire, 0, 1)) ?>--><img src="ressources\images\icone_compte.png"></button>
                    </form>
                </li>
            </ul>
            </div>
        </div>
</div>
<div class="main">
    <form method="post" action="main/choose_subpromotion" >
    <!-- Phrase et choix de la sous promotion -->
        <p>Veuillez choisir une sous promotion :</p>
    
    <!-- Assuming your form should be submitted to the "index.php" file -->
        <button type="submit" name="subpromotion" value="5A INSI">5A INSI</button>
        <button type="submit" name="subpromotion" value="5A REVA">5A REVA</button>
    </form>
</div>

</body>
</html>
