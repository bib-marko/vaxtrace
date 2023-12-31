<?php

use Illuminate\Support\Facades\Storage;

if (! function_exists('formatString')) {
    function formatString($string)
    {
        if($string != null && $string != "NA" && $string != ""){
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
        
        if(($user->person->middle_name != null || $user->person->middle_name != "NA") && ($user->person->suffix != null || $user->person->suffix != "NA")){
            $fullname = $user->person->first_name. ' '. $user->person->middle_name. ' '. $user->person->last_name. ' '. $user->person->suffix;
        }
        else if(($user->person->middle_name == null || $user->person->middle_name == "NA") && ($user->person->suffix != null || $user->person->suffix != "NA") ){
            $fullname = $user->person->first_name. ' '. $user->person->last_name. ' '. $user->person->suffix;
        }
        else if(($user->person->middle_name != null || $user->person->middle_name != "NA") && ($user->person->suffix == null || $user->person->suffix == "NA") ){
            $fullname = $user->person->first_name. ' '. $user->person->middle_name. ' '. $user->person->last_name;
        }
        else{
            $fullname = $user->person->first_name. ' '. $user->person->last_name;
        }
        
        return($fullname);
    }
}

if (! function_exists('generateVaccineeFullName')) {
    function generateVaccineeFullName($vaccinee)
    {
        $fullname = $vaccinee->first_name.' '.$vaccinee->middle_name.' '.$vaccinee->suffix;
        
        if(($vaccinee->middle_name != null || $vaccinee->middle_name != "NA") && ($vaccinee->suffix != null || $vaccinee->suffix != "NA")){
            $fullname = $vaccinee->first_name. ' '. $vaccinee->middle_name. ' '. $vaccinee->last_name. ' '. $vaccinee->suffix;
        }
        else if(($vaccinee->middle_name == null || $vaccinee->middle_name == "NA") && ($vaccinee->suffix != null || $vaccinee->suffix != "NA") ){
            $fullname = $vaccinee->first_name. ' '. $vaccinee->last_name. ' '. $vaccinee->suffix;
        }
        else if(($vaccinee->middle_name != null || $vaccinee->middle_name != "NA") && ($vaccinee->suffix == null || $vaccinee->suffix == "NA") ){
            $fullname = $vaccinee->first_name. ' '. $vaccinee->middle_name. ' '. $vaccinee->last_name;
        }
        else{
            $fullname = $vaccinee->first_name. ' '. $vaccinee->last_name;
        }
        
        return($fullname);
    }
}

if(! function_exists('saveActivityLog')){
    function saveActivityLog($fullname, $activity) {
        
        try {
            // my data storage location is project_root/storage/app/data.json file.
            $activitylogs = Storage::disk('local')->exists('ActivityLogs/activitylogs-'.date('Y-m-d').'.json') ? json_decode(Storage::disk('local')->get('ActivityLogs/activitylogs-'.date('Y-m-d').'.json')) : [];
            $inputData['full_name'] = $fullname;
            $inputData['activity'] = $activity;
            $inputData['datetime'] = date('Y-m-d H:i:s');
            array_push($activitylogs,$inputData);
            Storage::disk('local')->put('ActivityLogs/activitylogs-'.date('Y-m-d').'.json', json_encode($activitylogs));

            return $inputData;
        } catch(Exception $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        }
    }
}

if(! function_exists('saveSummaryLog')){
    function saveSummaryLog($fullname, $activity) {
        
        try {
            // my data storage location is project_root/storage/app/data.json file.
            $activitylogs = Storage::disk('local')->exists('ActivityLogs/activitylogs-'.date('Y-m-d').'.json') ? json_decode(Storage::disk('local')->get('ActivityLogs/activitylogs-'.date('Y-m-d').'.json')) : [];
            $inputData['full_name'] = $fullname;
            $inputData['activity'] = $activity;
            $inputData['datetime'] = date('Y-m-d H:i:s');
            array_push($activitylogs,$inputData);
            Storage::disk('local')->put('ActivityLogs/activitylogs-'.date('Y-m-d').'.json', json_encode($activitylogs));

            return $inputData;
        } catch(Exception $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        }
    }
}

if (! function_exists('formatDate')) {
    function formatDate($string)
    {
        // Creating timestamp from given date
        $timestamp = strtotime($string);
        
        // Creating new date format from that timestamp
        $new_date = date("Y-m-d", $timestamp);   
        
        return($new_date);
    }
}

