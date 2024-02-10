
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants</title>
    <base href="<?= $web_root ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/student_list.css" rel="stylesheet" type="text/css"/>
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
                    <li><button name="accueil">Accueil</button></li>
                    <li><button name="promotions">Sous promotions</button></li>
                    <li><button name="services">Services</button></li> 
                    <li><button name="etudiants">Liste des étudiants</button></li> 
                    
                </ul>
            </div>
    </div>

    <div class="main">
        <h2>Liste des étudiants - <?= $subpromotion ?></h2>
        <table border="1">
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= $student->Numero_etu ?></td>
                        <td><?= $student->Nom_etu ?></td>
                        <td><?= $student->Prenom_etu ?></td>
                        <td><?= $student->Signature_etu ?></td>
                        <td><?= $student->Heure_arrivee_etu ?></td>
                        <td><?= $student->Observation_etu ?></td>
        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div><td><?= $pdf?></td></div>
</body>
</html>
