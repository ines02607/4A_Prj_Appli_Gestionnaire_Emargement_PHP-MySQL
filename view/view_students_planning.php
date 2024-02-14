<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Plannig de cours</title>
    <base href="<?= $web_root ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/student_planning.css" rel="stylesheet" type="text/css"/>
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
                        <form class="barre_menu_boutons" action="main/go_sous_promotion" method="post">
                            <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
                            <button type="submit"name="promotions">SOUS-PROMOTIONS</button>
                        </form>
                    </li>
                    <li>
                        <form class="barre_menu_boutons" action="main/go_services" method="post">
                            <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
                            <button type="submit" name="services">SERVICES</button>
                        </form>
                    </li>    
                    <li>
                        <form action="main/actions_initiales" method="post">
                            <button id="profil" type="submit" name="initiales"><img src="ressources\images\icone_compte.png">
                            <!-- Ajout du name="initiales" <?= strtoupper(substr($user->Nom_secretaire, 0, 1) . substr($user->Prenom_secretaire, 0, 1)) ?>-->
                            </button>
                        </form>
                    </li>   
                </ul>
                </div>
            </div>
    </div>

    <div class="title">Planning de cours de la promotion <?= $subpromotion ?></div>
    <div class="main">
        <div class="bas_page">
        <form class="formDelete" method="POST" action="main/generate_pdf">
            <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
            <button type="submit" name="generation" value="pdf">Générer une feuille d'émargement</button>  
        </form>
        </div>
        
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
    </div>
</body>
</html>
