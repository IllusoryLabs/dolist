<?php
include_once 'main.php';
check_loggedin($pdo);

//Are there any expired reminders?
$expiredReminders = false;

$username = $_SESSION['name'];

//How many reminders are there?
$numReminders = $pdo -> query("SELECT COUNT(*) FROM reminders WHERE username LIKE '$username'");
$remindersCount = $numReminders -> fetch(PDO::FETCH_ASSOC);

$query = $pdo -> query("SELECT SUBSTRING('reminder', 1, 50) AS ExtractString FROM reminders WHERE username='$username'");
$result = $query -> execute();


function ifReminders($remindersCount) {
    if (implode($remindersCount) !== '0') {
        echo '<h2>Here are some personal reminders you have:</h2>';
    }
}

function DisplayReminders($remindersCount, $result) {
    if (implode($remindersCount) !== '0') {
        echo $result;
    }
}

function ifNoReminders($remindersCount) {
    if (implode($remindersCount) === '0') {
        echo 'We\'d give you some of your current reminders, but you don\'t have any! Good job!';
    }
}


function ifEndingReminders($remindersCount) {
    if (implode($remindersCount) !== '0') {
        echo '<h2>Here are some personal reminders you have that are ending soon:</h2>';
    }
}

function DisplayEndingReminders($remindersCount, $result) {
    if (implode($remindersCount) !== '0') {
        echo $result;
    }
}

function ifNoEndingReminders($remindersCount) {
    if (implode($remindersCount) === '0') {
        echo 'We\'d give you some of your current reminders, but you don\'t have any! Good job!';
    }
}
?>