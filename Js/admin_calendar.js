document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: 'get_events.php', // Charger les événements depuis le fichier PHP,
        selectable: true,
        eventClick: function(info) {
            var date = info.event.startStr;
            var state = info.event.extendedProps.state;

            // Montrez les boutons "Disponible" et "Indisponible"
            document.getElementById('buttons').style.display = 'block';

            // Configurez les actions pour les boutons
            document.getElementById('availableButton').addEventListener('click', function() {
                updateEventState(date, 'disponible');
            });

            document.getElementById('unavailableButton').addEventListener('click', function() {
                updateEventState(date, 'indisponible');
            });
        },
        defaultAllDayEventDuration: { days: 1 } // Durée par défaut pour les événements d'une journée
    });

    calendar.render();

    // Fonction pour mettre à jour l'état de l'événement en base de données
    function updateEventState(date, state) {
        // Effectuer une requête AJAX pour mettre à jour l'état
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_event.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Gérer la réponse du serveur ici (par exemple, afficher un message de confirmation)
                alert('État mis à jour avec succès !');
                // Cachez à nouveau les boutons après la mise à jour
                document.getElementById('buttons').style.display = 'none';
                // Rechargez le calendrier pour refléter le changement
                calendar.refetchEvents();
            }
        };
        xhr.send('date=' + date + '&state=' + state);
    }
});

