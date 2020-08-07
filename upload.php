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
               <h2>File Upload</h2>
               <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero ipsa veritatis, nesciunt tempora ducimus fuga? Nobis iusto, iure cupiditate, deleniti labore ab repellendus modi consequatur nulla ex facilis quas quia adipisci itaque error ut, distinctio alias quae repellat totam! Provident impedit corporis excepturi. Beatae perferendis saepe, blanditiis qui consequuntur ipsam!
               </p>

               <?php
                  // initialize
                  $fname = '';
                  $lname = '';

                  // for file
                  $allowedTypes = array(
                     'image/png',
                     'image/jpg',
                     'image/jpeg'
                  );
                  if( $_FILES['photo']) {
                     if( in_array( $_FILES['photo']['type'],$allowedTypes) !== false){
                        move_uploaded_file($_FILES['photo']['tmp_name'],"files/".$_FILES['photo']['name']);
                     }
                  }

                  // validation
                  if( isset($_POST['fname']) && !empty($_POST['fname']) ) { 
                     //$fname = htmlspecialchars($_POST['fname']);
                     $fname = filter_input(INPUT_POST,'fname',FILTER_SANITIZE_STRING);
                  } 

                  if( isset($_POST['lname']) && !empty($_POST['lname']) ) { 
                     $lname = filter_input(INPUT_POST,'lname',FILTER_SANITIZE_STRING);
                  } 
               ?>

               <pre>
                  <?php
                     print_r($_POST);
                     print_r($_FILES);
                  ?>
               </pre>

               <!-- render -->
               <h4>First Name: <?php echo $fname; ?></h4>
               <h4>Last Name: <?php echo $lname; ?></h4>

            </div>
         </div>
         <div class="row">
            <div class="column column-60 column-offset-20">
               <form method="POST" enctype="multipart/form-data">
                  <label for="fname">First Name:</label>
                  <input type="text" name="fname" id="fname" value="<?php echo $fname; ?>">

                  <label for="lname">Last Name:</label>
                  <input type="text" name="lname" id="lname" value="<?php echo $lname; ?>">

                  <label for="photo">Photo</label>
                  <input type="file" name="photo" id="photo"> <br>

                  <button type="submit">Submit</button>
               </form>
            </div>
         </div>
      </div>
   </body>

</html>