
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sous promotion 3A</title>
        <base href="<?= $web_root ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/home.css" rel="stylesheet" type="text/css"/>
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
                        <form action="main/go_sous_promo_3A" method="post">
                            <button type="submit" name="promotions">Sous promotions</button>
                        </form>
                    </li>
                    <li>
                        <form action="main/actions_initiales" method="post">
                            <button id="profil" type="submit" name="initiales"> <!-- Ajout du name="initiales" --><?= strtoupper(substr($user->Nom_secretaire, 0, 1) . substr($user->Prenom_secretaire, 0, 1)) ?></button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main">
            <form method="post" action="main/choose_subpromotion" >
            <!-- P{hrase et choix de la sous promotion -->
                <p>Veuillez choisir une sous promotion :</p>
            
            <!-- Assuming your form should be submitted to the "index.php" file -->
                <button type="submit" name="subpromotion" value="3A FISA">3A_FISA</button>
                <button type="submit" name="subpromotion" value="3A FISE">3A_FISE</button>
            </form>
        </div>
    </body>
</html>
