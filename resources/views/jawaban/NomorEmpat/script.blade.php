<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@3.9.0/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@3.9.0/main.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
    var calendar = new FullCalendar.Calendar($('#calendar')[0], {
        initialView: 'dayGridMonth',
        events: function(info, successCallback, failureCallback) {
            $.ajax({
                method: "GET",  
                url: "/event/get-json", 
                success: function(res) {
                    res.forEach(function(event) {
                        calendar.addEvent({
                            id: event.id,
                            title: event.title,  
                            start: event.start,  
                            end: event.end,     
                            backgroundColor: event.color, 
                        });
                    });
                    successCallback(res);  
                },
                error: function(err) {
                    console.error("Error fetching events:", err);
                    failureCallback(err);
                }
            });
        }
    });

    calendar.render();  
});

</script>