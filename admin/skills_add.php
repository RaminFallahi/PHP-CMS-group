<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

//check if the form has been submitted and exists
if( isset( $_POST['name'] ) )
{
  //conforms required form data is complete. 
  if( $_POST['name'] and $_POST['percent'] )
  {
    
    $query = 'INSERT INTO skills (
        name,
        percent,
        url
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['percent'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'skills has been added' );
    
  }
  
  header( 'Location: skills.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add skills</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
    
  <br>
  
  <label for="url">URL:</label>
  <textarea type="text" name="url" id="url"></textarea>
  
  <br>
  
  <label for="percent">PERCENT:</label>
  <textarea type="text" name="percent" id="percent"></textarea>
  
  <br>
  
  <input type="submit" value="Add skills">
  
</form>

<p><a href="skills.php"><i class="fas fa-arrow-circle-left"></i> Return to skills List</a></p>


<?php

include( 'includes/footer.php' );

?>