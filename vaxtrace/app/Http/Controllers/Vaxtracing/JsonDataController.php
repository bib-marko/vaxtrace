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
        $activity = json_decode(Storage::get('ActivityLogs/activitylogs-'.date('Y-m-d').'.json'), true);

        $activity = collect($activity)->sortBy('datetime', SORT_REGULAR, true);

        return Datatables::of($activity)->make(true);
    }
    public function getSummaryLogs()
    {
        $summary = json_decode(Storage::get('Summary/data.json'), true);

        $summary = collect($summary["data"]);
        
        return response()->json($summary);
    }
}
