<?php
include('assets/header.php');
if (is_logged_in()) {
	header('location: comments.php');
}
?>
		<h2>Registration</h2>
	<form name="registerform" onsubmit="return !!(formCheck3() & passCheck());" method="post" action="thanks.php" id="registerform">
		Enter username: <input type="text" name="username" class="email">
    Enter mail: <input type="text" name="mail" class="email">
    Enter password: <input type="password" name="password" class="name">
    Repeat your password: <input type="password" name="2password" class="name">
		<input type="submit" value="Register" class="submit">
	</form>
	<p class="logintext">Already a member?<a href="index.php"> Please log in here.</a></p>
  	<script src="assets/jsfunction.js" charset="UTF-8"></script>
</body>
</html>
