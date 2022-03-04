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


if (! function_exists('generateFullName')) {
    function generateFullName($user)
    {
        $fullname = $user->person->first_name.' '.$user->person->middle_name.' '.$user->person->suffix;
        
        if($user->person->middle_name != null && $user->person->first_name != null ){
            $fullname = $user->person->first_name. ' '. $user->person->middle_name. ' '. $user->person->last_name. ' '. $user->person->suffix;
        }
        else if($user->person->middle_name == null && $user->person->suffix != null ){
            $fullname = $user->person->first_name. ' '. $user->person->last_name. ' '. $user->person->suffix;
        }
        else if($user->person->middle_name != null && $user->person->suffix == null ){
            $fullname = $user->person->first_name. ' '. $user->person->middle_name. ' '. $user->person->last_name;
        }
        else{
            $fullname = $user->person->first_name. ' '. $user->person->last_name;
        }
        
        return($fullname);
    }
}