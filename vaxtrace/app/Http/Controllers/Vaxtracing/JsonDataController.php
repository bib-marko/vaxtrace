<?php

namespace App\Http\Controllers\Vaxtracing;

use Illuminate\Http\Request;
use DataTables;
use App\Http\Controllers\Controller;
use App\Models\Vaxtracing\Vaccinee;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Storage;

class JsonDataController extends Controller
{
    public function index()
    {
        $address = json_decode(file_get_contents(public_path() . "/js/user/address.json"), true);

        return response()->json( [$address] );
    }
    public function getActivity()
    {
        $activity = json_decode(Storage::get('activitylogs-'.date('Y-m-d').'.json'), true);

        $activity = collect($activity)->sortBy('datetime', SORT_REGULAR, true);

        return Datatables::of($activity)->make(true);
    }
    public function getVaccinees()
    {
        $vaccinee = json_decode(Storage::get('vaccinees_updated.json'), true);

        $vaccinee = collect($vaccinee["data"]);
        
        return response()->json($vaccinee);
    }
}
