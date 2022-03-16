<?php

namespace App\Http\Controllers\Vaxtracing;

use App\Http\Controllers\Controller;
use App\Models\Vaxtracing\Category;
use Illuminate\Http\Request;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::where('status','!=', 0)->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "";
                    
                    $actionBtn .= "<a class='update btn btn-alt-success btn-rounded  mr-5 mb-5 btnShowUpdate' onclick='update_category($row->id)'><i class='si si-pencil mr-5'></i>Update</a>";
                    $actionBtn .= "<a class='delete delete btn btn-alt-danger btn-rounded  mr-5 mb-5' onclick='delete_category($row->id)'><i class='si si-trash mr-5'></i>Delete</a>";
            
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
        $category = new Category();
        $category->cat_name = formatString($request->cat_name);
        $category->cat_description = formatString($request->cat_desc);
        $category->status = 1;
        $category->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id', $id)->first();
        
        return response()->json($category);
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
       
        $category = Category::find($id)
        ->update([
            'cat_name'=> formatString($request->cat_name),
            'cat_description'=> formatString($request->cat_desc),
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
        $category = Category::find($id)
            ->update([
                'status'=> 0,
            ]);
    }
}
