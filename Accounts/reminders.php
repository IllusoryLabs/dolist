<?php
include_once 'main.php';
check_loggedin($pdo);

//Are there any expired reminders?
$expiredReminders = false;

$username = $_SESSION['name'];

//How many reminders are there?
$numReminders = $pdo -> query("SELECT COUNT(*) FROM reminders WHERE username LIKE '$username'");
$remindersCount = $numReminders -> fetch(PDO::FETCH_ASSOC);

/*$query = $pdo -> query("SELECT SUBSTRING('reminder', 1, 50) AS ExtractString FROM reminders WHERE username='$username'");
$reminder = $query -> execute();*/

function ifReminders($remindersCount) {
    if (implode($remindersCount) !== '0') {
        echo '<h2>Here are some personal reminders you have:</h2>';
    }
}

function ifRemindersHome($remindersCount) {
    if (implode($remindersCount) !== '0') {
        echo 'Here are some personal reminders you have:';
    }
}

function DisplayReminders($remindersCount, $pdo, $reminder, $username) {
    if (implode($remindersCount) !== '0') {

        $stmt = $pdo->prepare("SELECT * FROM 'reminders' WHERE username='$username'");
        $stmt->execute();
        $reminder = $stmt->fetchAll(PDO::FETCH_ASSOC);

        ?>
        <!DOCTYPE html>
            <td><?=$reminder['reminder']?></td>
        </html>
        <?php
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

function ifEndingRemindersHome($remindersCount) {
    if (implode($remindersCount) !== '0') {
        echo 'Here are some personal reminders you have that are ending soon:';
    }
}

function DisplayEndingReminders($remindersCount, $pdo, $reminder, $username) {
    if (implode($remindersCount) !== '0') {

        $stmt = $pdo->prepare("SELECT * FROM reminders WHERE username='$username'");
        $stmt->execute();
        $reminder = $stmt->fetchAll(PDO::FETCH_ASSOC);

        ?>
        <!DOCTYPE html>
            <td><?=$reminder['reminder']?></td>
        </html>
        <?php
    }
}

function ifNoEndingReminders($remindersCount) {
    if (implode($remindersCount) === '0') {
        echo 'We\'d give you some of your current reminders, but you don\'t have any! Good job!';
    }
}
?>