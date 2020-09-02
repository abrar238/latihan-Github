<!DOCTYPE html>
<html>
 <head>
  
<script> 
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    }
   });
  });
  </script>
 </head>
 <body>
  <h2>Kalender</h2>
  <div class="container">
   <div id="calendar" style="width: 700px"></div>
  </div>
 </body>
</html>