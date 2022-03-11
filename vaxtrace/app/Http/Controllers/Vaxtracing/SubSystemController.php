<?php

namespace App\Http\Controllers\Vaxtracing;

use App\Http\Controllers\Controller;
use App\Models\Vaxtracing\SubSystem;
use Illuminate\Http\Request;
use DataTables;

class SubSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(! session('LoggedUser')->hasPermission('SUBSYSTEM_ACCESS'), 403);
        if ($request->ajax()) {
            $data = SubSystem::get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "";
                    if(session('LoggedUser')->hasPermission('SUBSYSTEM_VIEW')){
                        $actionBtn .= " <a class='view btn btn-alt-primary mr-5 mb-5' onclick='show_subsystem($row->id)'><i class='si si-eye mr-5'></i>View</button></a>";
                    }
                    if(session('LoggedUser')->hasPermission('SUBSYSTEM_UPDATE')){
                        $actionBtn .= "<a href='".route('update_subsystem', $row->id)."' class='update btn btn-alt-success mr-5 mb-5'><i class='si si-pencil mr-5'></i>Update</a>";
                    }
                    if(session('LoggedUser')->hasPermission('SUBSYSTEM_DELETE')){
                        $actionBtn .= "<a class='delete delete btn btn-alt-danger mr-5 mb-5' onclick='delete_subsystem($row->id)'><i class='si si-trash mr-5'></i>Delete</a>";
                    }
            
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
        abort_if(! session('LoggedUser')->hasPermission('SUBSYSTEM_CREATE'), 403);
        return view('Vaxtracing.admin.CreateSubsystem.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(! session('LoggedUser')->hasPermission('SUBSYSTEM_CREATE'), 403);
        $role = new SubSystem();
        $role->title = formatString($request->subsystem_name);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(! session('LoggedUser')->hasPermission('SUBSYSTEM_UPDATE'), 403);
        $subsystem = SubSystem::find($id);

        return view('Vaxtracing.admin.UpdateSubsystem.index', compact('subsystem'));
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
        abort_if(! session('LoggedUser')->hasPermission('SUBSYSTEM_UPDATE'), 403);
        $role = SubSystem::find($id)
            ->update([
                'title'=> formatString($request->subsystem_name),
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
        abort_if(! session('LoggedUser')->hasPermission('SUBSYSTEM_DELETE'), 403);
        $subsystem = SubSystem::find($id)->delete();
    }
}
