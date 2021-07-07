<?php
include 'main.php';
// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['reminder'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['reminder'])) {
	// One or more values are empty.
	exit('Please complete the form!');
}
function submitReminder($pdo) {
	// Username doesn't exist, insert new account
	$stmt = $pdo->prepare('INSERT INTO reminders (reminder, enddate) VALUES (?, ?)');
	$stmt->execute([ $_POST['reminder'], $_POST['enddate'] ]);
	echo 'You have successfully added a reminder, you can now view it on some of the pages!';
}
?>
