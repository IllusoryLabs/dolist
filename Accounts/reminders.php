<?php
include 'main.php';
check_loggedin($pdo);

//How many reminders are there?
define('numReminders', null);
//Are there any expired reminders?
define('expiredReminders', false);

$username = $account['username'];
$numReminders = $pdo -> query("SELECT * FROM reminders LIKE '$username'"); 

/*Get all relevant elemants from table to array
$sql = mysqli_query("select id, name, code from users");
$userinfo = array();

while ($row_user = mysql_fetch_assoc($sql))
    $userinfo[] = $row_user;
	*/
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>DoList</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>

    <body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>DoList</h1>
				<a href="home.php"><i class="fas fa-home"></i>Home</a>
				<a href="reminders.php"><i class="far fa-sticky-note"></i>Reminders</a>
				<a href="groups.php"><i class="fas fa-users"></i>Groups</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<?php if ($_SESSION['role'] == 'Admin'): ?>
				<a href="admin/index.php" target="_blank"><i class="fas fa-user-cog"></i>Admin</a>
				<?php endif; ?>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<p> <?php
            // Perform query
            if ($result = $mysqli -> query("SELECT * FROM reminders LIKE '$username'")) {
                echo "Returned rows are: " . $result -> num_rows;
                // Free result set
                $result -> free_result();
            }
            ?>
            </p>
		</div>
	</body>
</html>