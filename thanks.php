<?php
session_start();
include ('assets/phpfunctions.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nameusr = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $mailusr = filter_input(INPUT_POST, "mail", FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $pass2 = filter_input(INPUT_POST, "2password", FILTER_SANITIZE_STRING);
}

if (check_mail($mailusr) == false)
{
  echo"
       <script type=\"text/javascript\">
       alert('The email address that you entered is already registered');
       </script>";
       header('Refresh: 0; URL="registration.php"');
       exit();
}

if (isset($pass) && $pass == $pass2){
  insert_user($nameusr,$mailusr,$pass,generateSalt());
  echo "
       <script type=\"text/javascript\">
       alert('Registration completed! You are now being redirected to the log in page');
       </script>";
  header("Refresh: 0; URL=index.php");
}
else {
  echo "Your passwords do not match";
?> <h1><a href="register.php">Please try again</a></h1>
<?php }
if (ltrim(rtrim($nameusr)) == "" || ltrim(rtrim($mailusr)) == "" || ltrim(rtrim($pass)) == "" || ltrim(rtrim($pass2)) == "") {
  echo "Please go back and fill something in";
  ?> <h1 class="back"><a href="registration.php">Back</a></h1> <?php
  exit;
}

?>
