<?php

namespace App;

class Phone
{
    /////////// Format Phone Number to "123.123.1234" ///////////////////////////
    public static function phoneNumber($numb) {
        
      if (!is_numeric(substr($numb, 0, 1))  && !is_numeric(substr($numb, 1, 1))) { return $numb; }
     
      $chars = array(' ', '(', ')', '-', '.');
      $numb = str_replace($chars, "", $numb);
      
      
       
      
        $numb = substr($numb, 0, 3) . '.' . substr($numb, 3, 3) . '.' . substr($numb, 6, 4);
      
     // dd($numb);
      return $numb;
    }
}
