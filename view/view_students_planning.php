<?php
require_once 'controller/ControllerMain.php';
$controllerMain = new ControllerMain();
$json_file_path = $controllerMain->get_planning_json($subpromotion);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Planning de cours</title>
    <base href="<?= $web_root ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/student_planning.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.9.0/main.min.css" rel="stylesheet">

    <!-- Inclure les fichiers JavaScript de FullCalendar -->
    <script src="lib/fullcalendar-6.1.10/packages/google-calendar/index.global.js"></script>
    <script src="lib/fullcalendar-6.1.10/packages/google-calendar/index.global.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.9.0/main.min.js"></script>

    
    <script src="lib/fullcalendar-6.1.10/packages/icalendar/index.global.js"></script>
    <script src="lib/fullcalendar-6.1.10/packages/icalendar/index.global.min.js"></script>
    <script src="lib/fullcalendar-6.1.10/packages/icalendar/index.global.min.js"></script>
    
    <script src="lib/fullcalendar-6.1.10/packages/core/index.global.js"></script>
    <script src="lib/fullcalendar-6.1.10/packages/core/index.global.min.js"></script>
    <script src="lib/fullcalendar-6.1.10/packages/core/locales-all.global.js"></script>
    <script src="lib/fullcalendar-6.1.10/packages/core/locales-all.global.min.js"></script>
    
    <script src="lib/fullcalendar-6.1.10/packages/daygrid/index.global.js"></script>
    <script src="lib/fullcalendar-6.1.10/packages/daygrid/index.global.min.js"></script>
    
    <script src="lib/fullcalendar-6.1.10/packages/timegrid/index.global.js"></script>
    <script src="lib/fullcalendar-6.1.10/packages/timegrid/index.global.min.js"></script>
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
            <input type="hidden" id="summaryField" name="summary" value="">
            <button type="submit" name="generation" value="pdf">Générer une feuille d'émargement</button>  
        </form>
        </div>
        <div id="calendar"></div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.9.0/main.min.js"></script>
	<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        //plugins: ['dayGrid', 'timeGrid', 'list', 'interaction'],
        selectable: true,
        locale: 'fr',
        weekends: false,
        headerToolbar: {
            left: '', // Retirer tous les éléments à gauche
            center: 'title', // Garder seulement le titre au centre
            right: '' // Retirer tous les éléments à droite
        },
        timeZone: 'Europe/Paris',
	eventClick: function(info) {
	    var clickedEvent = info.event;
	    var eventSummary = clickedEvent.extendedProps.summary; // Récupérer le summary de l'événement cliqué
	    alert('Cours sélectionné : ' + eventSummary); // Afficher le summary à titre d'exemple
	    
	    document.getElementById('summaryField').value = eventSummary;
	},
        eventRender: function(info) {
            // Définissez une liste de couleurs bleues dans différents tons
            var blueColors = ['#6495ED', '#4169E1', '#0000FF', '#1E90FF', '#00BFFF'];

            // Obtenez l'index de l'événement dans la liste des événements
            var eventIndex = info.event._def.publicId;

            // Choisissez une couleur en fonction de l'index de l'événement
            var colorIndex = eventIndex % blueColors.length;

            // Appliquez la couleur à la case de l'événement
            info.el.style.backgroundColor = blueColors[colorIndex];
        },
        events: '<?php echo $json_file_path; ?>', // Chemin vers votre fichier JSON contenant les données des cours
        eventContent: function(arg) {
            return {
                html: '<b>' + arg.timeText + '</b><br>' + arg.event.extendedProps.summary
            };
        }
    });

    calendar.render();
});

</script>
    </div>
</body>
</html>
