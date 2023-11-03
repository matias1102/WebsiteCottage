document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('admin-calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: 'get_events.php', // Charger les événements depuis le fichier PHP
        selectable: true,
        eventClick: function(info) {
            var date = info.event.startStr;
            var state = info.event.extendedProps.state;

            // Montrez les boutons "Disponible" et "Indisponible"
            document.getElementById('buttons').style.display = 'block';

            // Configurez les actions pour les boutons
            document.getElementById('availableButton').addEventListener('click', function() {
                // Utilisez une requête AJAX pour envoyer les données au backend
                updateEventState(date, 'disponible');
            });

            document.getElementById('unavailableButton').addEventListener('click', function() {
                // Utilisez une requête AJAX pour envoyer les données au backend
                updateEventState(date, 'indisponible');
            });
        },
        defaultAllDayEventDuration: { days: 1 } // Durée par défaut pour les événements d'une journée
    });

    calendar.render();

    // Fonction pour mettre à jour l'état de l'événement en base de données
    function updateEventState(date, state) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'save_state.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Gérer la réponse du serveur ici (par exemple, afficher un message de confirmation)
                alert(xhr.responseText);
                // Cachez à nouveau les boutons après la mise à jour
                document.getElementById('buttons').style.display = 'none';
                // Rechargez le calendrier pour refléter le changement
                calendar.refetchEvents();
            }
        };
        xhr.send('date=' + date + '&state=' + state);
    }
});


