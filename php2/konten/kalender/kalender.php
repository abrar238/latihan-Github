<script> 
$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        themeSystem:'jquery-ui',
        editable: true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay,listMonth'
        },
        eventLimit:true,
        selectable: true,
        selectHelper: true,
        events: "?hal=load",
        select: function (start, end, allDay) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: '?hal=insert',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("berhasil ditambahkan");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        editable: true,
        eventResize: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: '?hal=updatekal',
                        data: 'title=' + event.title + '&start=' + start + '&endy=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("berhasil diubah");
                        }
                    });
                },
        editable: true,
        eventClick:function(event){
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: '?hal=updatekal',
                        data: 'title=' + event.title + '&start=' + start + '&endy=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("berhasil diubah");
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
                            displayMessage("berhasil dihapus");
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

<style>
#calendar {
    width: 600px;
}
.response {
    height: 60px;
}
</style>
    <div class="response"></div>
    <div id='calendar'></div>