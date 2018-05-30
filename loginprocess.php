<script src="assets/jsfunction.js" charset="UTF-8"></script>
<?php
session_start();
include ('assets/phpfunctions.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginusr = filter_input(INPUT_POST, "loginmail", FILTER_SANITIZE_STRING);
    $loginpass = filter_input(INPUT_POST, "loginpassword", FILTER_SANITIZE_STRING);
}
if (isset($loginusr) && (isset($loginpass))){
    if (!log_in($loginusr, $loginpass)) {
          echo"
               <script type=\"text/javascript\">
               alerter();
               </script>";
          header("refresh: 0 URL=index.php");
    }
     else {
       echo"
            <script type=\"text/javascript\">
            alert('You are now logged in!');
            </script>";
       header("refresh: 0; URL=comments.php");
           echo "log_in funktionen fungerade";
    }
}
 ?>
