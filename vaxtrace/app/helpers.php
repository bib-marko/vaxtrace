<?php

if (! function_exists('formatString')) {
    function formatString($string)
    {
        if($string != null){
            $string = trim($string);
            $string = strtoupper($string);
            $string = strip_tags($string); 
        }
        else{
            $string = "";
        }
        
        return($string);
    }
}