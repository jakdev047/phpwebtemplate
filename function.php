<?php

function isChecked($inputName,$value) {
   if(isset($_POST[$inputName]) && is_array($_POST[$inputName]) && in_array($value,$_POST[$inputName])) {
      echo "checked";
   }

}

function displayOptions($options,$selectedValues) {
   foreach($options as $option){
      $selected = '';
      $option = strtolower($option);
      if(in_array($option,$selectedValues)) {
         $selected = 'selected';
      }
      printf("<option value='%s' %s>%s</option>\n",$option,$selected,ucwords($option));
   }
}