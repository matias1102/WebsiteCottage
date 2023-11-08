document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('admin-calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      selectable: true, 
      events: {
        url: 'get_events.php',
        method: 'POST',
        extraParams: {
          custom_param: 'custom_value'
        }
      },
      dateClick: function(info) {
        var date = info.dateStr;
        toggleState(date, 'indisponible');
      }
    });
    calendar.render();

    function toggleState(date, state) {
        // Envoie une requête AJAX pour ajouter ou supprimer l'état dans la base de données
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'toggle_state.php', true); 
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
              if (response.state === 'added') {
                addState(date, 'indisponible');
              } else if (response.state === 'removed') {
                removeState(date, 'indisponible');
              }
              setTimeout(function() {
                calendar.refetchEvents();
              }, 10);
            }
          }
        };
        xhr.send('date=' + date + '&state=' + state);
      }      
});
