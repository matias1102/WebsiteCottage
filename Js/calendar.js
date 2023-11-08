document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth'
  });
  calendar.render();

  function updateCalendarEvents() {
      
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'get_events.php', true);
      xhr.onload = function() {
          if (xhr.status >= 200 && xhr.status < 300) {
              
              console.log(xhr.responseText);
              var events = JSON.parse(xhr.responseText);
              calendar.removeAllEvents(); 
              calendar.addEventSource(events); 
          }
      };
      xhr.send();
  }

  setInterval(updateCalendarEvents, 5000);
});
