<?php
include 'main.php';
check_loggedin($pdo);
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
			<h2>Welcome Back, <?=$_SESSION['name']?>!</h2>
			<p class="block">
				Here are some personal reminders you have that are ending soon:

				<br><br>

				<?php
				include 'endingSoon.php';
				?> 
			</p>
		</div>

		<div class="content">
			<p class="block"
			
			>Here are some groups you're in:

			<br><br>

			<?php
			include 'listGroups.php';
			?> 

			</p>
		</div>
	</body>
</html>
