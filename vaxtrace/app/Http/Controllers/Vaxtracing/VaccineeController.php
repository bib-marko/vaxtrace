<?php

namespace App\Http\Controllers\Vaxtracing;

use App\Http\Controllers\Controller;
use App\Models\Vaxtracing\Category;
use App\Models\Vaxtracing\Category_has_Sub_Category;
use App\Models\Vaxtracing\Transactions;
use App\Models\Vaxtracing\Vaccinee;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class VaccineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$data = Transactions::with('vaccinees', 'status_report')->get()->toArray();
        // $data = Vaccinee::with('transactions')->get()->toArray();
        // dd($data);
        if ($request->ajax()) {
            $data = Vaccinee::select('*',DB::raw("CONCAT(first_name , ' ' , middle_name , ' ' , last_name, ' ' , suffix) as full_name"))
                                ->where('status','!=', 0)->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "";
                    $actionBtn .= " <a class='view btn btn-alt-primary btn-rounded mr-5 mb-5' onclick='show_vaccinee($row->id)'><i class='si si-eye mr-6'></i></button></a>";
                    $actionBtn .= "<a class='update btn btn-alt-success btn-rounded mr-5 mb-5' onclick='update_vaccinee($row->id)'><i class='si si-pencil mr-6'></i></a>";
                    $actionBtn .= "<a class='delete delete btn btn-alt-danger btn-rounded mr-5 mb-5' onclick='delete_vaccinee($row->id)'><i class='si si-trash mr-6'></i></a>";
                    // $actionBtn .= "<a class='warning btn-rounded btn btn-alt-warning mr-5 mb-5' href='".route('view_transaction_summary', $row->id)."'><i class='si si-trash mr-5'></i>View Transactions</a>";
                    $actionBtn .= "<a class='warning btn-rounded btn btn-alt-warning mr-5 mb-5' onclick='show_monitor_vaccinee($row->id)'><i class='si si-eyeglasses mr-5'></i>Monitor Vaccinee</a>";
            
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Vaccinee();
        $role->vaccinee_code = $request->vaccinee_code;
        $role->first_name = formatString($request->first_name);
        $role->middle_name = formatString($request->middle_name);
        $role->last_name = formatString($request->last_name);
        $role->suffix = formatString($request->suffix);
        $role->birth_date = formatDate($request->birth_date);
        $role->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaccinee = Vaccinee::where('id', $id)->first();
       
        //dd($vaccinee);
        return response()->json($vaccinee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Vaccinee::where('id', $id)
        ->update([
            'vaccinee_code'=> $request->vaccinee_code,
            'first_name'=> formatString($request->first_name),
            'middle_name'=> formatString($request->middle_name),
            'last_name'=> formatString($request->last_name),
            'suffix'=> formatString($request->suffix),
            'birth_date'=> $request->birth_date,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vaccinee::where('id', $id)
        ->update(['status' => 0]);
    }

    public function viewTransact($id){

        $vaccinee = Vaccinee::where('id', $id)->first();

        return view('Vaxtracing.admin.TrackingSystem.VaccineeMasterList.ViewTransaction.index', compact('vaccinee'));
    }
}
