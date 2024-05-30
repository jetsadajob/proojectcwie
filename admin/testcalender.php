<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- library -->
    <link href="js/fullcalendar/lib/main.css" rel="stylesheet" />
</head>
<body>
    <div id="calendar"></div>
    
<!-- ไลบรารีปลั๊กอิน sweetalert2  -->
<script src="js/sweetalert2.all.min.js"></script>
<!-- library -->
<script src="js/fullcalendar/lib/main.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    height: 650,
  });

  calendar.render();
});
</script>


</body>
</html>