<?php

namespace App\Http\Controllers\Vaxtracing;

use App\Http\Controllers\Controller;
use App\Models\Vaxtracing\Category;
use App\Models\Vaxtracing\Sub_Category;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::with(["sub_categories" => function($q){
                $q->where('sub_categories.status', '=', 1);
            }])->where('status','!=', 0)->where('id','=', session()->get('current_category'))->first();
            
           
            return Datatables::of($data->sub_categories)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "";
                    
                    $actionBtn .= "<a class='update btn btn-alt-success btn-rounded mr-5 mb-5' onclick='update_subcategory($row->id)'><i class='si si-pencil mr-5'></i>Update</a>";
                    $actionBtn .= "<a class='delete delete btn btn-alt-danger btn-rounded mr-5 mb-5' onclick='delete_subcategory($row->id)'><i class='si si-trash mr-5'></i>Delete</a>";
            
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
        //dd($request);
        $sub_category = new Sub_Category();
        $sub_category->sub_cat_name = formatString($request->sub_cat_name);
        $sub_category->sub_cat_description = formatString($request->sub_cat_desc);
        $sub_category->status = 1;
        $sub_category->save();
        $sub_category->categories()->sync($request->category_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_category = Sub_Category::where('id', $id)->first();
        
        return response()->json($sub_category);
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
        $sub_category = Sub_Category::find($id)
        ->update([
            'sub_cat_name'=> formatString($request->sub_cat_name),
            'sub_cat_description'=> formatString($request->sub_cat_desc),
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
        $sub_category = Sub_Category::find($id)
            ->update([
                'status'=> 0,
            ]);
    }
}
