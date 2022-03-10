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

    
    public function create()
    {
        abort_if(! session('LoggedUser')->hasPermission('ROLE_CREATE'), 403);
        $subsystems = SubSystem::orderBy('title')->get();
        $permissions = Permission::orderBy('name')->get();
        return view('Vaxtracing.admin.CreateDepartment.index', compact('permissions','subsystems'));
    }

   
    public function store(Request $request)
    {
        abort_if(! session('LoggedUser')->hasPermission('ROLE_CREATE'), 403);
        $role = new Role();
        $role->title = formatString($request->title);
        $role->short_code = formatString($request->short_code);
        $role->save();
        $role->permissions()->sync($request->permissions);
    }

  
    public function show($id)
    {
        $role = Role::find($id);

        return response()->json($role);
    }

  
    public function edit($id)
    {
        abort_if(! session('LoggedUser')->hasPermission('ROLE_UPDATE'), 403);
        $role = Role::with('permissions')->find($id);
    
        $permissions = Permission::orderBy('name')->get();

        return view('Vaxtracing.admin.UpdateDepartment.index', compact('permissions','role'));
    }

  
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

    
    public function destroy($id)
    {
        abort_if(! session('LoggedUser')->hasPermission('ROLE_DELETE'), 403);
        $role = Role::find($id)->delete();
    }

}
