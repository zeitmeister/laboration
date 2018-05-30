<?php
function generateSalt() {
    $length = 10;
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function insert_user($usrnm,$usrml,$passwrd,$salt) {
  include('connection.php');
  $hashedpassw = md5($salt . $passwrd);
 try {
   $result = $dbz->prepare("INSERT INTO users (username, mail, password, salt) VALUES (?, ?, ?, ?) ");
   $result->bindParam(1,$usrnm,PDO::PARAM_STR);
   $result->bindParam(2,$usrml,PDO::PARAM_STR);
   $result->bindParam(3,$hashedpassw,PDO::PARAM_STR);
   $result->bindParam(4,$salt,PDO::PARAM_STR);
   $result->execute();
 } catch (Exception $e) {
   echo 'fel hittat i insert_user-funktionen ' . $e->getMessage();
 }
}

function log_in($usrnm2, $passwrd2) {
  include('connection.php');
  try {
    $s = $dbz->prepare("SELECT salt FROM users where mail = ?");
    $s->bindParam(1,$usrnm2,PDO::PARAM_STR);
    $p = $dbz->prepare("SELECT password FROM users where mail = ?");
    $p->bindParam(1,$usrnm2,PDO::PARAM_STR);
    $n = $dbz->prepare("SELECT username FROM users where mail = ?");
    $n->bindParam(1,$usrnm2,PDO::PARAM_STR);
    $s->execute();
    $p->execute();
    $n->execute();
  } catch (Exception $e) {
    echo "Fel hittat i log_in-funktionen ";
  }
  $salts = $s->fetchAll(PDO::FETCH_ASSOC);
  $passwords = $p->fetchAll(PDO::FETCH_ASSOC);
  $names = $n->fetchAll(PDO::FETCH_ASSOC);
  $realsalt = "";
  $realpass = "";
  $realname = "";
  foreach ($names as $name) {
    $realname = $name['username'];
  }
  foreach ($salts as $salt) {
    $realsalt = $salt['salt'];
  }
  foreach ($passwords as $psw) {
    $realpass = $psw['password'];
  }
  if (md5($realsalt . $passwrd2) === $realpass) {
     $_SESSION['loggedin'] = $usrnm2;
     $_SESSION['loggedin2'] = $realname;
    echo "Login sucessfull!";
    return true;
  } /*else { ?>
         <script type="text/javascript">
         alert("Login failed! Username or password doesn't match");
         </script>
         <?php
   header("Refresh: 1; URL=index.php");*/
   else {
    return false;
  }
}

function print_name(){
  include ('connection.php');
  try {
    $result = $db->query("SELECT Namn, Comment FROM main ORDER BY Id DESC");
  } catch (Exception $e) {
    echo "print_name funktionen fungerade inte som väntat. " . $e->getMessage();
  }
$comments = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="commentwrapper">
  <ul>
    <?php
foreach ($comments as $comment) {
  $print = $comment['Namn'];
  $print .= " wrote: ";
  $print .= $comment['Comment'];
 ?>
    <li><?php echo $print; ?></li>
<?php
  }
} ?>
  </ul>
</div>
<?php
function insert_comment($name,$mail,$comment){
  include ('connection.php');

  try {
    $result = $db->prepare("INSERT INTO main (Namn, Mail, Comment) VALUES (?, ?, ?)");
    $result->bindParam(1,$name,PDO::PARAM_STR);
    $result->bindParam(2,$mail,PDO::PARAM_STR);
    $result->bindParam(3,$comment,PDO::PARAM_STR);
    $result->execute();
  }
  catch (Exception $e) {
    echo "insert_comment funktionen fungerade inte som väntat. " . $e->getMessage();
  }
}

function is_logged_in() {
  if (isset($_SESSION['loggedin'])) {
    return true;
  } else {
    return false;
  }
}

function check_mail ($usrmail) {
  include('connection.php');
  try {
    $results = $dbz->query("SELECT mail FROM users");
    $mailArray = $results->fetchAll(PDO::FETCH_ASSOC);
    foreach ($mailArray as $mailcheck) {
      if ($usrmail == $mailcheck['mail']) {
        return false;
        }
      }
      return true;
    }
    catch (Exception $e){
      $e->getMessage();
    }
  }
 ?>
