<?php

function isChecked($inputName,$value) {
   if(isset($_POST[$inputName]) && is_array($_POST[$inputName]) && in_array($value,$_POST[$inputName])) {
      echo "checked";
   }

}

function displayOptions($options) {
   foreach($options as $option){
      printf("<option value='%s'>%s</option>\n",strtolower($option),ucwords($option));
   }
}