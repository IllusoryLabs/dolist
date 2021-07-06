<?php
include 'reminders.php';

if (implode($remindersCount) !== '0') {
    echo 'Here are some personal reminders you have that are ending soon:
    <br><br>';
    echo $result;
}

if (implode($remindersCount) === '0') {
    echo 'We\'d give you some of your current reminders, but you don\'t have any! Good job!';
}
?>