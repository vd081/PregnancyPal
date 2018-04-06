<?php
require_once 'Appointments.php';
$phpCalendar = new PHPCalendar ();

$calendarHTML = $phpCalendar->getCalendarHTML();
echo $calendarHTML;
?>