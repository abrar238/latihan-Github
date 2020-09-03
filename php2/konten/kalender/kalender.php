 <head>
  
<script>

$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
    editable: true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    
    events: "?hal=load",
    displayEventTime: false,
    eventRender: function (event, element, view) {
    if (event.allDay === 'true') {
         event.allDay = true;
     } else {
        event.allDay = false;
    }
},
selectable: true,
selectHelper: true,
select: function (start, endy, allDay) {
    var title = prompt('Event Title:');
    if (title) {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var endy = $.fullCalendar.formatDate(endy, "Y-MM-DD HH:mm:ss");
      $.ajax({
          url: '?hal=insert',
          data: 'title=' + title + '&start=' + start + '&endy=' + endy,
          type: "POST",
          success: function (data) {
          displayMessage("data berhasil");
            }
        });
        calendar.fullCalendar('renderEvent',{
          title: title,
          start: start,
          endy: endy,
          allDay: allDay
          },
          true
        );
    }
    calendar.fullCalendar('unselect');
},
editable: true,
eventDrop: function (event, delta) {
    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
    var endy = $.fullCalendar.formatDate(event.endy, "Y-MM-DD HH:mm:ss");
    $.ajax({
      url: '?hal=updatekal',
      data: 'title=' + event.title + '&start=' + start + '&endy=' + endy + '&id=' + event.id,
      type: "POST",
      success: function (response) {
      displayMessage("update berhasil");
        }
     });
    },
    eventClick: function (event) {
    var deleteMsg = confirm("hapus data?");
    if (deleteMsg) {
    $.ajax({
      type: "POST",
      url: "?hal=deletekal",
      data: "&id=" + event.id,
      success: function (response) {
          if(parseInt(response) > 0) {
              $('#calendar').fullCalendar('removeEvents', event.id);
              displayMessage("delete berhasil");
                }
             }
         });
      }
    } 

  });
});

function displayMessage(message) {
      $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>



  <style type="text/css">
    #calender{
      position: absolute;
    }
  </style>
 </head>
 <body>
  <h3>Kalender</h3>
  <div class="container">
   <div id="calendar" style="width: 550px"></div>
  </div>
 </body>
