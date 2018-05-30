<?php
session_start();
include ('assets/connection.php');
include ('assets/phpfunctions.php');
 ?>

	<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "fmail", FILTER_SANITIZE_STRING);
    $comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_STRING);
    if (!is_logged_in()) {?>
      <script type="text/javascript">
      alert("You are not logged in");
      </script>
      <?php
      header('Refresh:0.0; URL=index.php');
      exit();
    }
    if (ltrim(rtrim($name)) == "" || ltrim(rtrim($email)) == "" || ltrim(rtrim($comment)) == "") {
      echo "Please go back and fill something in";
      ?> <h1 class="back"><a href="index.php">Back</a></h1> <?php
      exit;
    }
  }
  if (isset($_POST['fname']) && ($email == $_SESSION['loggedin'])) {
    insert_comment($name,$email,$comment);
    header ("Refresh:0.0; URL=comments.php");
  }
    else {
  echo "You can not post as anyone else than yourself";
  ?> <h1 class="back"><a href="comments.php">Back</a></h1> <?php
}
?>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="assets/jsfunction.js" charset="UTF-8"></script>
</body>
</html>
