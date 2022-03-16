<?php

namespace App\Http\Controllers\Vaxtracing;

use Illuminate\Http\Request;
use DataTables;
use App\Http\Controllers\Controller;
use App\Models\Vaxtracing\Vaccinee;
use Illuminate\Auth\Events\Verified;
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
            $verifiedVaccinee = Vaccinee::where('status','!=', 0)
                                ->where('vaccinee_code', '=', $row['uniq_id'])
                                ->where('first_name', '=', $row['first_name'])
                                ->where('last_name', '=', $row['last_name'])
                                ->where('middle_name', '=', $row['middle_name'])
                                ->where('suffix', '=', $row['suffix'])
                                ->where('birth_date', '=', $row['birth_date'])
                                ->first();
           
            if( $verifiedVaccinee == null)
            {
                $actionBtn .= "<a class='view btn btn-alt-danger mr-5 mb-5' id='btnVerify'><i class='si si-check mr-5'></i>Verify</button></a>";
            }
            else{
                $actionBtn .= "<a class='view btn btn-alt-primary mr-5 mb-5'disabled><i class='si si-check mr-5'></i>Verified</button></a>";
            }
            
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
