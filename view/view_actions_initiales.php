
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Action initiales</title>
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
                        <form action="main/choose_actions_initiales" method="post">
                            <button type="submit" name="actions_initiales" value="initial"> 
                                <?= strtoupper(substr($user->Nom_secretaire, 0, 1) . substr($user->Prenom_secretaire, 0, 1)) ?>
                            </button>
                            <button type="submit" name="actions_initiales" value="profil">Profil</button>
                            <button type="submit" name="actions_initiales" value="déconnexion"><a href="main/logout">Déconnexion</a></button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main">
            <!-- Texte de bienvenue -->
            <div class="titre">Bonjour
                <div id="Nom_secretaire">
                    <?= $user->Prenom_secretaire ?> !
                </div>
                Bienvenue dans votre gestionnaire d’émargement.
            </div>

            <!-- Phrase et choix de promotion -->
            <p>Veuillez choisir une promotion :</p>
            <form action="main/choose_promotion" method="post" >
                <button type="submit" name="promotion" value="3A">3A</button>
                <button type="submit" name="promotion" value="4A">4A</button>
                <button type="submit" name="promotion" value="5A">5A</button>
            </form>
        </div>
    </body>
</html>
