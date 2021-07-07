<?php
include 'reminders.php';

ifRemindersHome($remindersCount);
DisplayReminders($remindersCount, $pdo, $reminder, $username);
ifNoReminders($remindersCount);
?>