<?php

use Illuminate\Support\Facades\Storage;

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

if(! function_exists('saveActivityLog')){
    function saveActivityLog($fullname, $activity) {
        
        try {
            // my data storage location is project_root/storage/app/data.json file.
            $activitylogs = Storage::disk('local')->exists('activitylogs-'.date('Y-m-d').'.json') ? json_decode(Storage::disk('local')->get('activitylogs-'.date('Y-m-d').'.json')) : [];
            $inputData['full_name'] = $fullname;
            $inputData['activity'] = $activity;
            $inputData['datetime'] = date('Y-m-d H:i:s');
            array_push($activitylogs,$inputData);
            Storage::disk('local')->put('activitylogs-'.date('Y-m-d').'.json', json_encode($activitylogs));

            return $inputData;
        } catch(Exception $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        }
    }
}

