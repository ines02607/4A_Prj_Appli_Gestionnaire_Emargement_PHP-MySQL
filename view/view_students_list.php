
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants</title>
    <base href="<?= $web_root ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/student_list.css" rel="stylesheet" type="text/css"/>
    <style>
        .main{
            background-color: #d9d9d9;
        }
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

        form button {
            margin : 20px auto;
            display: block;
            background-color: #4e8af4;
            background-image: linear-gradient(to bottom, #00395d, #599ef6); 
            border-radius: 20px; 
            color: white;
            width: 70%;
            font-family: 'Jost', sans-serif;
            font-weight: bolder;
            font-size: 18px;
            padding:15px;
        }

        form button:hover{
            margin : 20px auto;
            display: block;
            background-color: black; 
            background-image: linear-gradient(to bottom, #3d4a5a, #000000);
            border-radius: 20px; 
            width: 50%;
            font-family: 'Jost', sans-serif;
            font-weight: bolder;
            font-size: 18px;

        }
        #trash{
            margin:0px;
            margin-left: 5px;
            display : inline-block;
        }
        #edit{
            margin: 0px;
            margin-left: 5px;
            display : inline-block;
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
                        <form action="main/go_students_list" method="post">  
                            <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
                            <button type="submit" name="etudiants">Liste des étudiants</button>
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
        <h2>Liste des étudiants - <?= $subpromotion ?></h2>
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>Nb</th>
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
                                <button id="edit" class="delete" type="submit" name="action" value="update"><img src="ressources\images\edit_3.png" style="width: 20px; height: 20px;">
                                
                            </form>
                        </td>

                        <!-- Ajoutez d'autres cellules selon vos besoins -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <form method="POST" action="main/add_student_form">
            <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
            <button type="submit" name="add_student" value="add">Ajouter un nouvel étudiant</button>
        </form>
        <form method="POST" action="main/choose_service">
            <input type="hidden" name="subpromotion" value="<?= $subpromotion ?>">
            <button type="submit" name="service" value="planning">Consulter l'emploi du temps</button>
        </form>

    </div>
</body>
</html>
