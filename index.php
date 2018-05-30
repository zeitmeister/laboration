<?php
include('assets/header.php');
		?>
		<h2>Log in</h2>
	<form name="registerform" onsubmit="return formCheck()" method="post" action="loginprocess.php" id="loginform">
		<?php if (isset($_POST['mail'])){
			echo 'Email: <input type="text" name="fmail" class="email" value = "'.$_POST['mail'].'">';
		} else {
			echo 'Mail: <input type="text" name="loginmail" class="email">';
		}
?>
    Password: <input type="password" name="loginpassword" class="name">
		<input type="submit" value="Login" class="submit">
	</form>
  <p class="logintext">Not yet a member? <a href="registration.php">Please register here.</a></p>
<script src="assets/jsfunction.js" charset="UTF-8"></script>

</body>
</html>
