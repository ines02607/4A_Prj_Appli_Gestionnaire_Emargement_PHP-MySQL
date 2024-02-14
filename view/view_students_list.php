
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants</title>
    <base href="<?= $web_root ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/student_list.css" rel="stylesheet" type="text/css"/>
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

    <div class="title">Liste des étudiants - <?= $subpromotion ?></div>
    <div class="main">
        <div class="bas_page">
        <form method="POST" action="main/add_student_form">
            <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
            <button type="submit" name="add_student" value="add">Ajouter un nouvel étudiant</button>
        </form>
        </div>
        
        <br>
        <table>
            <thead>
                <tr>
                    <th>N°</th>
                    <th style="width: 10%;">Numéro étudiant</th>
                    <th style="width: 20%;">Nom</th>
                    <th style="width: 20%;">Prénom</th>
                    <th style="width: 40%;">Observations</th>
                    <th colspan="2" style="width: 10%;">Actions</th>
                    <!-- Ajoutez d'autres colonnes selon vos besoins -->
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= $i++?> </td>
                        <td><?= $student->Numero_etu ?></td>
                        <td><?= $student->Nom_etu ?></td>
                        <td><?= $student->Prenom_etu ?></td>
                        <td><?= $student->Observation_etu ?></td>
                        <td>
                            <form class="action" method="POST" action="main/action">
                                <input type="hidden" name="student_num" value="<?= $student->Numero_etu ?>">
                                <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
                                <button id="trash" class="delete" type="submit" name="action" value="delete" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant?');"><img src="ressources\images\trash-can_2.png" style="width: 20px; height: 20px;">

                            </form>
                        </td>
                        <td>
                            <form class="action" method="POST" action="main/action">
                                <input type="hidden" name="student_num" value="<?= $student->Numero_etu ?>">
                                <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
                                <button id="edit" type="submit" name="action" value="update"><img src="ressources\images\edit_3.png" style="width: 20px; height: 20px;">
                                
                            </form>
                        </td>

                        <!-- Ajoutez d'autres cellules selon vos besoins -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <div class="bas_page">
        <form method="POST" action="main/choose_service">
            <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
            <button type="submit" name="service" value="planning">Consulter l'emploi du temps</button>
        </form>
        </div>
    </div>
</body>
</html>
