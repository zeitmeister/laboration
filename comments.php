<?php
include('assets/header.php');
    ?>
    <h2>Comments</h2>
    <script>
      $(document).ready(function() {
        $('#commentform').submit(function(evt){
          evt.preventDefault();
          var url = $(this).attr("action");
          var formData = $(this).serialize();
          $.post(url, formData, function(response){
            location.reload();
          }); //end post
        }); //end submit
      }); //end ready

    </script>
	<form name="commentform" onsubmit="return formCheck2();" action="redirect.php"  method="post" id="commentform">
    <?php if (!is_logged_in()) {
      	echo "Name: <input type='text' name='fname' class='name' disabled>";
        echo "Email: <input type='text' name='fmail' class='email' disabled>";
        echo "Comment: <textarea name='comment' class='comment' disabled></textarea>";?>
        </form>
        <?php   echo "You must be logged in to see and post comments";?>
          <p><a href="index.php">Please log in to see comments</a></p>
          <?php
    } else if(is_logged_in()) {
		  echo  'Name: <input type="text" name="fname" class="name" value = "'.$_SESSION['loggedin2'].'" readonly>';
      echo 'Email: <input type="text" name="fmail" class="email" value = "'.$_SESSION['loggedin'].'" readonly>';
      echo "Comment: <textarea name='comment' class='comment'></textarea>";
      echo "<input type= 'submit' value='Submit' class='submit'>";
	?>
  </form>
	<?php
    print_name();  //kallar på funktionen som skriver ut alla kommentarer
    }
?>
<script src="assets/jsfunction.js" charset="UTF-8"></script>
</html>
