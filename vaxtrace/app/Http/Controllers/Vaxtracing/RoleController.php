<?php

namespace App\Http\Controllers\Vaxtracing;

use App\Http\Controllers\Controller;
use App\Models\Vaxtracing\Permission;
use App\Models\Vaxtracing\Role;
use App\Models\Vaxtracing\SubSystem;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(! session('LoggedUser')->hasPermission('ROLE_ACCESS'), 403);
        if ($request->ajax()) {
            $data = Role::get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "";
        
                    $actionBtn = "     
                            <a class='view btn btn-alt-primary mr-5 mb-5' onclick='show_role($row->id)'><i class='si si-eye mr-5'></i>View</button></a>
                            <a href='".route('update_department', $row->id)."' class='update btn btn-alt-success mr-5 mb-5'><i class='si si-pencil mr-5'></i>Update</a>
                            <a class='delete delete btn btn-alt-danger mr-5 mb-5' onclick='delete_role($row->id)'><i class='si si-trash mr-5'></i>Delete</a>
                    ";
            
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
        abort_if(! session('LoggedUser')->hasPermission('ROLE_CREATE'), 403);
<<<<<<< HEAD
        $permissions = Permission::orderBy('name')->get();

        return view('Vaxtracing.admin.CreateDepartment.index', compact('permissions'));
=======
        $subsystems = SubSystem::orderBy('title')->get();
        $permissions = Permission::orderBy('name')->get();
        return view('Vaxtracing.admin.CreateDepartment.index', compact('permissions','subsystems'));
>>>>>>> b3e9f9e63581d5bb35119deca5810ace8bf06fc5
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(! session('LoggedUser')->hasPermission('ROLE_CREATE'), 403);
        $role = new Role();
        $role->title = formatString($request->title);
        $role->short_code = formatString($request->short_code);
        $role->save();
        $role->permissions()->sync($request->permissions);
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
        abort_if(! session('LoggedUser')->hasPermission('ROLE_UPDATE'), 403);
        $role = Role::with('permissions')->find($id);
    
        $permissions = Permission::orderBy('name')->get();

        return view('Vaxtracing.admin.UpdateDepartment.index', compact('permissions','role'));
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
        abort_if(! session('LoggedUser')->hasPermission('ROLE_UPDATE'), 403);
        $role = Role::find($id);

        $role->permissions()->sync($request->permissions);

        $role = Role::find($id)
            ->update([
                'title'=> formatString($request->title),
                'short_code'=> formatString($request->short_code)
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
        abort_if(! session('LoggedUser')->hasPermission('ROLE_DELETE'), 403);
        $role = Role::find($id)->delete();
    }
}
