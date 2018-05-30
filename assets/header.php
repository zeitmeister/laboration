<?php
session_start();
include ('assets/phpfunctions.php');
include ('assets/connection.php');
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
		<!--<script src="assets/jsfunction.js" charset="UTF-8"></script>-->
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<title>Student Chat</title>
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
</head>

<body>
		<div class="header">
			<h1 class="title">Student chat</h1>
      <?php if (is_logged_in()) { ?>
        <p class="logout"><a href="logout.php">Log out</a></p>
        <?php
      } ?>

		</div>
