<?php

namespace App\Http\Controllers\Vaxtracing;

use App\Http\Controllers\Controller;
use App\Models\Vaxtracing\Permission;
use App\Models\Vaxtracing\SubSystem;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Permission::with('subsystem')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "";
                    if(session('LoggedUser')->hasPermission('PERMISSION_VIEW')){
                        $actionBtn .= " <a class='view btn btn-alt-primary btn-rounded mr-5 mb-5' onclick='show_permission($row->id)'><i class='si si-eye mr-5'></i>View</button></a>";
                    }
                    if(session('LoggedUser')->hasPermission('PERMISSION_UPDATE')){
                        $actionBtn .= "<a href='".route('update_permission', $row->id)."' class='update btn btn-alt-success btn-rounded mr-5 mb-5'><i class='si si-pencil mr-5'></i>Update</a>";
                    }
                    if(session('LoggedUser')->hasPermission('PERMISSION_DELETE')){
                        $actionBtn .= "<a class='delete delete btn btn-alt-danger btn-rounded mr-5 mb-5' onclick='delete_permission($row->id)'><i class='si si-trash mr-5'></i>Delete</a>";
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
        abort_if(! session('LoggedUser')->hasPermission('PERMISSION_CREATE'), 403);
        $subsystems = SubSystem::get();

        return view('Vaxtracing.admin.CreatePermission.index', compact('subsystems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(! session('LoggedUser')->hasPermission('PERMISSION_CREATE'), 403);
        $permission = new Permission();
        $permission->name = formatString($request->permission_name);
        $permission->sub_systems_id = $request->subsystem;
        $permission->save();
        
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
        abort_if(! session('LoggedUser')->hasPermission('PERMISSION_UPDATE'), 403);
        $permission = Permission::find($id);
        $subsystems = SubSystem::get();

        return view('Vaxtracing.admin.UpdatePermission.index', compact('permission', 'subsystems'));
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
        abort_if(! session('LoggedUser')->hasPermission('PERMISSION_UPDATE'), 403);
        $role = Permission::find($id)
            ->update([
                'name'=> formatString($request->permission_name),
            ]);
        DB::statement("UPDATE permissions SET sub_systems_id = '$request->subsystem' where id = '$id'");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(! session('LoggedUser')->hasPermission('PERMISSION_DELETE'), 403);
        $permission = Permission::find($id)->delete();
    }
}
