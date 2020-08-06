<?php

function isChecked($inputName,$value) {
   if(isset($_POST[$inputName]) && is_array($_POST[$inputName]) && in_array($value,$_POST[$inputName])) {
      echo "checked";
   }

}
