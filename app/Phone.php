<?php

namespace App;

use Auth;

class Phone
{
    public static function phoneNumber($numb) {
        
        if (!is_numeric(substr($numb, 0, 1))  && !is_numeric(substr($numb, 1, 1))) { return $numb; }
     
        $chars = array(' ', '(', ')', '-', '.', '+');
        $numb = str_replace($chars, "", $numb);
               
            if (Auth::user()->username == 'HK34') {
                $numb = '+' . substr($numb, 0, 2) . '.' . substr($numb, 2, 1) . '.' . substr($numb, 3, 3) . '.' . substr($numb, 6, 4);
            } else {
                $numb = substr($numb, 0, 3) . '.' . substr($numb, 3, 3) . '.' . substr($numb, 6, 4); 
            }
        
      return $numb;
    }

    public static function cellNumber($numbcell) {
        
        if (!is_numeric(substr($numbcell, 0, 1))  && !is_numeric(substr($numbcell, 1, 1))) { return $numbcell; }
     
        $chars = array(' ', '(', ')', '-', '.', '+');
        $numbcell = str_replace($chars, "", $numbcell);
               
            if (Auth::user()->username == 'HK34') {
                $numbcell = '+' . substr($numbcell, 0, 2) . '.' . substr($numbcell, 2, 3) . '.' . substr($numbcell, 5, 3) . '.' . substr($numbcell, 8, 4);
            } else {
                $numbcell = substr($numbcell, 0, 3) . '.' . substr($numbcell, 3, 3) . '.' . substr($numbcell, 6, 4); 
            }
        
      return $numbcell;
    }
}
