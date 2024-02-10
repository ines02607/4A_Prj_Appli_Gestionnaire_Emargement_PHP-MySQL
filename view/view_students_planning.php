<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Plannig de cours</title>
    <base href="<?= $web_root ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet" type="text/css"/>
    <style>
        .Lundi { background-color: #ffcccc; } /* Lundi */
        .Mardi { background-color: #ccffcc; } /* Mardi */
        .Mercredi { background-color: #ccccff; } /* Mercredi */
        .Jeudi { background-color: #ffffcc; } /* Jeudi */
        .Vendredi { background-color: #ffccff; } /* Vendredi */
        .Samedi { background-color: #ccffff; } /* Samedi */
        .Dimanche { background-color: #f0f0f0; } /* Dimanche */
        
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
                        <form action="main/go_sous_promotion" method="post">
                            <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
                            <button type="submit"name="promotions">Sous promotions</button>
                        </form>
                    </li>
                    <li>
                        <form action="main/go_services" method="post">
                            <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
                            <button type="submit" name="services">Services</button>
                        </form>
                    </li> 
                    <li>
                        <form action="main/go_planning" method="post">  
                            <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
                            <input type="hidden" name="evenments" value="<?= $evenments ?>">
                            <button type="submit" name="planning">Plannig de cours</button>
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
        <h2>Planning de cours de la promotion <?= $subpromotion ?></h2>
        <br>
        
        <table id="plannig" border="1">
            <thead>
                <tr>
                    <th>Jour et Date</th>
                    <th>Heure de début</th>
                    <th>Heure de fin</th>
                    <th>Cours</th>
                    <!-- Ajoutez d'autres colonnes selon vos besoins -->
                </tr>
            </thead>
            <tbody>
            <?php 
                // Tableau associatif pour traduire les noms des jours de la semaine en français
                $jours_fr = array(
                    'Monday' => 'Lundi',
                    'Tuesday' => 'Mardi',
                    'Wednesday' => 'Mercredi',
                    'Thursday' => 'Jeudi',
                    'Friday' => 'Vendredi',
                    'Saturday' => 'Samedi',
                    'Sunday' => 'Dimanche'
                );

                foreach ($evenments as $evenment): ?>
                    <tr class="<?= $jours_fr[date('l', strtotime($evenment['start']))] ?>">
                    <td><?= $jours_fr[date('l', strtotime($evenment['start']))] . ' ' . date('d/m/Y', strtotime($evenment['start'])) ?></td>
                        <td><?= date('H:i', strtotime($evenment['start'])) ?></td>
                        <td><?= date('H:i', strtotime($evenment['end'])) ?></td>
                        <td><?= $evenment['summary'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <form class="formDelete" method="POST" action="main/generate_pdf">
            <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
            <button type="submit" name="generation" value="pdf">Générer une feuille d'émargement</button>  
        </form>
    </div>
</body>
</html>