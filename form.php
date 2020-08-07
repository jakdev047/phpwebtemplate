<?php
   header('X-XSS-Protection:0');
   include_once 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>PHP</title>

      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.0/milligram.css">

      <style>
         body{margin-top: 30px;}
      </style>

   </head>

   <body>
      <div class="container">
         <div class="row">
            <div class="column column-60 column-offset-20">
               <h2>Form</h2>
               <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero ipsa veritatis, nesciunt tempora ducimus fuga? Nobis iusto, iure cupiditate, deleniti labore ab repellendus modi consequatur nulla ex facilis quas quia adipisci itaque error ut, distinctio alias quae repellat totam! Provident impedit corporis excepturi. Beatae perferendis saepe, blanditiis qui consequuntur ipsam!
               </p>

               <?php
                  // initialize
                  $fname = '';
                  $lname = '';
                  $checked =  '';
                  $skills = '';
                  $fruits = ['Banana','lemon','Mango','orange'];
                  $sfruits = '';
                  
                  // validation
                  if( isset($_POST['fname']) && !empty($_POST['fname']) ) { 
                     //$fname = htmlspecialchars($_POST['fname']);
                     $fname = filter_input(INPUT_POST,'fname',FILTER_SANITIZE_STRING);
                  } 

                  if( isset($_POST['lname']) && !empty($_POST['lname']) ) { 
                     $lname = filter_input(INPUT_POST,'lname',FILTER_SANITIZE_STRING);
                  } 

                  if( isset($_POST['cb1']) && $_POST['cb1']==1 ) {
                     $checked =  'checked';
                  }

                  if( isset($_POST['skills']) ) {
                     $skills = $_POST['skills'];
                  }
               
               ?>

               <!-- render -->
               <h4>First Name: <?php echo $fname; ?></h4>
               <h4>Last Name: <?php echo $lname; ?></h4>
               <h4>
                  <?php
                     // $sfruits = filter_input(INPUT_POST,'fruits',FILTER_SANITIZE_STRING,FILTER_REQUIRE_ARRAY);
                     $sfruits = $_POST['fruits'] ?? array();
                     if(count($sfruits)>0) {
                        echo "you have selected:".join(',',$sfruits);
                     }
                  ?>
               </h4>
               <ul>
                  <?php foreach( $skills as $skill) { ?>
                     <li> <?php echo $skill; ?> </li>
                  <?php  } ?>
               </ul>
            </div>
         </div>
         <div class="row">
            <div class="column column-60 column-offset-20">
               <form method="POST">
                  <label for="fname">First Name:</label>
                  <input type="text" name="fname" id="fname" value="<?php echo $fname; ?>">

                  <label for="lname">Last Name:</label>
                  <input type="text" name="lname" id="lname" value="<?php echo $lname; ?>">

                  <input type="checkbox" name="cb1" id="cb1" value="1" <?php echo $checked; ?> >
                  <label for="cb1" class="label-inline">Terms & Condition</label> <br>

                  <!-- select -->
                  <label for="fruits">Select Some Fruits</label>
                  <select  name="fruits[]" id="fruits" multiple>
                     <?php displayOptions($fruits,$fruits) ?>
                  </select>

                  <!-- group checked -->
                  <label class="label">Select Some Skills</label>

                  <input type="checkbox" name="skills[]" value="html5" <?php isChecked('skills','html5') ?> >
                  <label for="cb1" class="label-inline">HTML5</label> <br>

                  <input type="checkbox" name="skills[]" value="css3" <?php isChecked('skills','css3') ?> >
                  <label for="cb1" class="label-inline">CSS3</label> <br>

                  <input type="checkbox" name="skills[]" value="sass" <?php isChecked('skills','sass') ?> >
                  <label for="cb1" class="label-inline">SASS</label> <br>

                  <input type="checkbox" name="skills[]" value="javascrip" <?php isChecked('skills','javascrip') ?> >
                  <label for="cb1" class="label-inline">JavaScript</label> <br>

                  <input type="checkbox" name="skills[]" value="php" <?php isChecked('skills','php') ?> >
                  <label for="cb1" class="label-inline">PHP7</label> <br>

                  <button type="submit">Submit</button>
               </form>
            </div>
         </div>
      </div>
   </body>

</html>