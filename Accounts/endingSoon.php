<?php
include 'reminders.php';

if ($numReminders > 0) {
    //code here
} else  if ($numReminders === 0 && !expiredReminders){
    echo 'Hooray! You\'ve completed all of your current goals!';
}
?>