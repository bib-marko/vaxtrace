<?php

namespace App\Http\Controllers\Vaxtracing;

use App\Http\Controllers\Controller;
use App\Models\Vaxtracing\Category;
use App\Models\Vaxtracing\Category_has_Sub_Category;
use App\Models\Vaxtracing\Sub_Category;
use App\Models\Vaxtracing\Summary;
use App\Models\Vaxtracing\Transactions;
use App\Models\Vaxtracing\Vaccinee;
use Carbon\Carbon;
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
        abort_if(! session('LoggedUser')->hasPermission('VACCINEE_ACCESS'), 403);
        // dd($data);
        if ($request->ajax()) {
            $data = Vaccinee::select('*',DB::raw("CONCAT(first_name , ' ' , middle_name , ' ' , last_name, ' ' , suffix) as full_name"))
                                ->where('status','!=', 0)->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "";
                    if(session('LoggedUser')->hasPermission('VACCINEE_VIEW')){
                        $actionBtn .= " <a class='view btn btn-alt-primary btn-rounded mr-5 mb-5' onclick='show_vaccinee($row->id)'><i class='si si-eye mr-6'></i></button></a>";
                    }
                    if(session('LoggedUser')->hasPermission('VACCINEE_UPDATE')){
                        $actionBtn .= "<a class='update btn btn-alt-success btn-rounded mr-5 mb-5' onclick='update_vaccinee($row->id)'><i class='si si-pencil mr-6'></i></a>";
                    }
                    if(session('LoggedUser')->hasPermission('VACCINEE_DELETE')){
                        $actionBtn .= "<a class='delete delete btn btn-alt-danger btn-rounded mr-5 mb-5' onclick='delete_vaccinee($row->id)'><i class='si si-trash mr-6'></i></a>";
                    }
                    if(session('LoggedUser')->hasPermission('VACCINEE_MONITOR')){
                        $actionBtn .= "<a class='warning btn-rounded btn btn-alt-warning mr-5 mb-5' onclick='show_monitor_vaccinee($row->id)'><i class='si si-eyeglasses mr-5'></i>Monitor Vaccinee</a>";
                    }
       
                    
                    // $actionBtn .= "<a class='warning btn-rounded btn btn-alt-warning mr-5 mb-5' href='".route('view_transaction_summary', $row->id)."'><i class='si si-trash mr-5'></i>View Transactions</a>";
                    
            
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
        abort_if(! session('LoggedUser')->hasPermission('VACCINEE_CREATE'), 403);
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
        abort_if(! session('LoggedUser')->hasPermission('VACCINEE_VIEW'), 403);
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
        abort_if(! session('LoggedUser')->hasPermission('VACCINEE_UPDATE'), 403);
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
        abort_if(! session('LoggedUser')->hasPermission('VACCINEE_DELETE'), 403);
        Vaccinee::where('id', $id)
        ->update(['status' => 0]);
    }

    public function monitor($id){
        abort_if(! session('LoggedUser')->hasPermission('VACCINEE_MONITOR'), 403);
        $vaccinee = Vaccinee::where('id', $id)->first();
        $categories = Category::where('status',1)->get();
        $sub_categories = Sub_Category::with('categories')->where('status',1)->get();
        $transactions = Transactions::where('vaccinees_id', $id)->where('status', 1)->get();
        
        return response()->json(array(
            'vaccinee' => $vaccinee,
            'categories' => $categories,
            'sub_categories' => $sub_categories,
            'transactions' => $transactions,
        ));
    }

    public function showSummary($id){
        abort_if(! session('LoggedUser')->hasPermission('VACCINEE_MONITOR'), 403);
        $transactions = Transactions::with('summary.status_report.category', 'summary.status_report.sub_category')->where('vaccinees_id', $id)->get();
        
        return Datatables::of($transactions)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "";
                    if(session('LoggedUser')->hasPermission('VACCINEE_UPDATE')){
                        $actionBtn .= " <a class='view btn btn-alt-primary btn-rounded mr-5 mb-5' onclick='update_vaccinee_transaction($row->vaccinees_id)'>Update</button></a>";
                    }
                    
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function saveTransaction(Request $request){
        abort_if(! session('LoggedUser')->hasPermission('VACCINEE_ADD_TRANSACTION'), 403);
        foreach($request->sub_category as $sub_category){
            $pivot = Category_has_Sub_Category::where('categories_id', $request->category)->where('sub_categories_id', $sub_category)->first();
            $trans_id = DB::table('vaccinees_has_transactions')->insertGetId(
                ['vaccinees_id' => $request->vaccinee_id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            );
            
            $summary = new Summary();
            $summary->category_has_sub_category_id = $pivot->id;
            $summary->vaccinees_transaction_id = $trans_id;
            $summary->trans_details = formatString($request->t_details);
            $summary->trans_status = $request->transaction_status;
            $summary->assist_by = generateFullName(session()->get('LoggedUser'));
            $summary->save();
            
        }
    }

    public function showTransaction($id){
        $transaction = Transactions::with('summary.status_report.category', 'summary.status_report.sub_category')->where('vaccinees_id', $id)->first();

        return response()->json($transaction);
    }
    
    public function saveUpdateTransaction(Request $request)
    {
        abort_if(! session('LoggedUser')->hasPermission('VACCINEE_UPDATE_TRANSACTION'), 403);
        $summary = new Summary();
        $summary->category_has_sub_category_id = $request->cat_has_sub_category;
        $summary->vaccinees_transaction_id = $request->vaccinees_transaction_id;
        $summary->trans_details = formatString($request->t_details);
        $summary->trans_status = $request->transaction_status;
        $summary->assist_by = generateFullName(session()->get('LoggedUser'));
        $summary->save();
    }
}
