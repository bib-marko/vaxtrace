<?php

namespace App\Http\Controllers\Vaxtracing;

use Illuminate\Http\Request;
use DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AddressController extends Controller
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
        $vaccinee = json_decode(Storage::get('vaccinees.json'), true);

        $vaccinee = collect($vaccinee)->sortBy('uniq_id', SORT_REGULAR, true);

        return Datatables::of($vaccinee)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $actionBtn = "";
            $id = $row['uniq_id'];
            $actionBtn .= "<a class='view btn btn-alt-successgit mr-5 mb-5' onclick='verifyVaccinee($id)'><i class='si si-check mr-5'></i>Verify</button></a>";
            
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
