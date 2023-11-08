document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('admin-calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: 'get_events.php', // Charger les événements depuis le fichier PHP
        selectable: true,
        eventClick: function(info) {
            var date = info.event.startStr;
            var state = info.event.extendedProps.state;

            // Mettez à jour les valeurs des champs cachés dans le formulaire
            document.getElementById('dateInput').value = date;
            document.getElementById('stateInput').value = state;

            // Soumettez le formulaire
            document.getElementById('updateForm').submit();
        },
        defaultAllDayEventDuration: { days: 1 } // Durée par défaut pour les événements d'une journée
    });

    calendar.render();
});



