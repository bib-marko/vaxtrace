<?php

namespace App\Http\Controllers\Vaxtracing;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Vaxtracing\Person;
use App\Models\Vaxtracing\Role;
use App\Models\Vaxtracing\User;
use DataTables;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::join('people', 'users.id', '=', 'people.user_id')->where('users.deleted_at', NULL)
                        ->join('roles', 'roles.id', '=', 'users.role_id')
                        ->where('users.id','!=', session('LoggedUser')->id)
                        ->select('*','users.id as user_id','users.deleted_at as user_status',DB::raw("CONCAT(first_name , ' ' , middle_name , ' ' , last_name, ' ' , suffix) as full_name"))->withTrashed()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "";
               
                    if($row->user_status == null){
                        if(session('LoggedUser')->hasPermission('USER_VIEW')){
                            $actionBtn .= "<a class='view btn btn-alt-primary btn-rounded btn-outline-primary mr-5 mb-5' data-toggle='click-ripple' onclick='show_people($row->user_id)'><i class='si si-eye mr-5'></i>View</button></a>";
                        }
                        if(session('LoggedUser')->hasPermission('USER_UPDATE')){
                            $actionBtn .= "<a href='".route('update_people', $row->user_id)."' class='update btn btn-alt-success btn-rounded btn-outline-success mr-5 mb-5'  data-toggle='click-ripple'><i class='si si-pencil mr-5'></i>Update</a>";
                        }
                        if(session('LoggedUser')->hasPermission('USER_DELETE')){
                            $actionBtn .= "<a class='delete btn btn-alt-danger btn-outline-danger btn-rounded mr-5 mb-5'  data-toggle='click-ripple' onclick='delete_people($row->user_id)'><i class='si si-trash mr-5'></i>Delete</a>";
                        }
                    }
                    
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function showDeletedPeople(Request $request)
    {
        if ($request->ajax()) {
            $data = User::join('people', 'users.id', '=', 'people.user_id')->where('users.deleted_at', '!=',NULL)
            ->select('*','users.id as user_id','users.deleted_at as user_status','users.modified_by as user_deleted_by',DB::raw("CONCAT(first_name , ' ' , middle_name , ' ' , last_name, ' ' , suffix) as full_name"))->withTrashed()->get();
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "";
                    if(session('LoggedUser')->hasPermission('USER_RESTORE')){
                        $actionBtn = "<a class='delete btn btn-alt-warning btn-rounded btn-outline-warning mr-5 mb-5' onclick='restore_people($row->user_id)'><i class='si si-settings mr-5'></i>Restore</a>";
                    }
                    
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function showRestoredPeople(Request $request)
    {
        if ($request->ajax()) {
            $data = User::join('people', 'users.id', '=', 'people.user_id')->where('users.reason', '!=',NULL)
            ->select('*','users.id as user_id','users.modified_by as user_restored_by',DB::raw("CONCAT(first_name , ' ' , middle_name , ' ' , last_name, ' ' , suffix) as full_name"))->get();
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "";
                    if(session('LoggedUser')->hasPermission('USER_DELETE')){
                        $actionBtn = "<a class='delete btn btn-alt-danger btn-rounded btn-outline-danger mr-5 mb-5' onclick='delete_people($row->user_id)'><i class='si si-trash mr-5'></i>Delete</a>";
                    }  
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // public function getDashboardData(Request $request){

    //     DB::statement("SET SQL_MODE=''"); // set the strict to false

    //     $total_user = User::count();
        
    //     return view('Vaxtracing.admin.index', compact('total_user'));
    // }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        abort_if(! session('LoggedUser')->hasPermission('USER_CREATE'), 403);
        $request -> validate([
            'first_name' => 'required|regex:/^[a-zA-Z\s]*$/',
            'last_name' => 'required|regex:/^[a-zA-Z\s]*$/',
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:users',
            'sex' => 'required |regex:/^[a-zA-Z\s]*$/',
            'contact_number' => 'required|digits:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'region' => 'required',
            'province' => 'required',
            'city' => 'required',
            'barangay' => 'required',
            'home_address' => 'required', 
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make("secret123");
        $user->role_id = $request->role;
        $user->save();

        $person = new Person();
        $person->first_name = formatString($request->first_name);
        $person->middle_name = formatString($request->middle_name);
        $person->last_name = formatString($request->last_name);
        $person->suffix = formatString($request->suffix);
        $person->birth_date = $request->birth_date;
        $person->sex = formatString($request->sex);
        $person->contact_number = $request->contact_number;
        $person->region = $request->region;
        $person->province = $request->province;
        $person->city = $request->city;
        $person->barangay = $request->barangay;
        $person->home_address = formatString($request->home_address);

        $user->save();
        $user->person()->save($person);
        saveActivityLog(generateFullName(session('LoggedUser')), "Created user with ID#: ".$user->id);
    }

 
    public function show($id)
    {
        abort_if(! session('LoggedUser')->hasPermission('USER_VIEW'), 403);
        $users = User::with('person','role')->where('users.id', $id)->first();
        $role = Role::find($users->role->id);
        
       
        $permission1 = [];
        
        foreach ($role->permissions as $permission) {
            array_push($permission1, $permission->name);
        }

        $users->role->permissions = $permission1;
        //saveActivityLog(generateFullName(session('LoggedUser')), "View user with ID#: ".$id);

        //dd($users->role->permissions->contains("USER_CREATE"));
        return response()->json($users);
    }

   
    public function edit($id)
    {
        abort_if(! session('LoggedUser')->hasPermission('USER_UPDATE'), 403);
        $users = User::with('person')->where('id', $id)->first();
        $total_role = Role::get();
        return view('Vaxtracing.admin.UpdatePerson.index',compact('users', 'total_role'));
    }

    public function editProfile(Request $request,$id)
    {
        $request -> validate([
                'first_name' => 'required|regex:/^[a-zA-Z\s]*$/',
                'last_name' => 'required|regex:/^[a-zA-Z\s]*$/',
                'birth_date' => 'required|date',
                'sex' => 'required |regex:/^[a-zA-Z\s]*$/',
                'contact_number' => 'required|digits:11|regex:/^([0-9\s\-\+\(\)]*)$/',
                'region' => 'required',
                'province' => 'required',
                'city' => 'required',
                'barangay' => 'required',
                'home_address' => 'required', 
            ]);

        $person = User::find($id);

        $person = $person->person()
            ->update([
                'first_name'=> formatString($request->first_name),
                'middle_name'=> formatString($request->middle_name),
                'last_name'=> formatString($request->last_name),
                'suffix'=> formatString($request->suffix),
                'sex'=> formatString($request->sex),
                'birth_date'=> $request->birth_date,
                'contact_number'=> $request->contact_number,
                'region'=> $request->region,
                'province'=> $request->province,
                'city'=> $request->city,
                'barangay'=> $request->barangay,
                'home_address'=> formatString($request->home_address),
                'modified_by' => generateFullName(session('LoggedUser'))
            ]);
        
        $user = User::with('person')->where('id', '=', session('LoggedUser')->id)->first();
        session()->pull('LoggedUser');
        $request->session()->put('LoggedUser', $user);
        saveActivityLog(generateFullName(session('LoggedUser')), "Update own profile ");
    }

   
    public function update(Request $request, $id)
    {
        abort_if(! session('LoggedUser')->hasPermission('USER_UPDATE'), 403);
        // $request -> validate([
        //     'first_name' => 'required|regex:/^[a-zA-Z\s]*$/',
        //     'last_name' => 'required|regex:/^[a-zA-Z\s]*$/',
        //     'birth_date' => 'required|date',
        //     'email' => 'required|email|unique:users,email,'.$id,
        //     'sex' => 'required |regex:/^[a-zA-Z\s]*$/',
        //     'contact_number' => 'required|digits:11|regex:/^([0-9\s\-\+\(\)]*)$/',
        //     'region' => 'required',
        //     'province' => 'required',
        //     'city' => 'required',
        //     'barangay' => 'required',
        //     'home_address' => 'required', 
        // ]);

        $person = User::find($id);

        $person = $person->person()
            ->update([
                'first_name'=> formatString($request->first_name),
                'middle_name'=> formatString($request->middle_name),
                'last_name'=> formatString($request->last_name),
                'suffix'=> formatString($request->suffix),
                'sex'=> formatString($request->sex),
                'birth_date'=> $request->birth_date,
                'contact_number'=> $request->contact_number,
                'region'=> $request->region,
                'province'=> $request->province,
                'city'=> $request->city,
                'barangay'=> $request->barangay,
                'home_address'=> formatString($request->home_address),
                'modified_by' => generateFullName(session('LoggedUser'))
            ]);
        $user = User::where('id', $id)
            ->update([
                'email'=> $request->email,
                'role_id'=> $request->role,
            ]);
        saveActivityLog(generateFullName(session('LoggedUser')), "Update user with ID#: ".$id);
    }

    public function changePassword(Request $request)
    {
        $request -> validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_new_password' => 'required', 
        ]);
        if (Hash::check($request->old_password, session('LoggedUser')->password)) {
            User::where('id', session('LoggedUser')->id)
            ->update([
                'password'=> Hash::make($request->new_password)
            ]);
        }
        else{
            return response()->json(['error'=>'You entered an incorrect password'],422); 
        }
        saveActivityLog(generateFullName(session('LoggedUser')), "Own password was changed");
    }
    
    public function destroy(Request $request, $id)
    {
        abort_if(! session('LoggedUser')->hasPermission('USER_DELETE'), 403);
        $request -> validate([
            'reason1' => 'required',
        ]);
        $user = User::where('id', $id)
            ->update([
                'reason'=> $request->reason1,
                'modified_by' => generateFullName(session('LoggedUser'))
            ]);
        User::find($id)->delete();
        saveActivityLog(generateFullName(session('LoggedUser')), "Deleted user with ID#: ".$id);
        return response()->json(['success'=>'User account deleted successfully.']);
    }

    public function restore(Request $request, $id)
    {
        abort_if(! session('LoggedUser')->hasPermission('USER_RESTORE'), 403);
        $request -> validate([
            'restore_reason' => 'required',
        ]);
        $user = User::withTrashed()->where('id', $id)
            ->update([
                'reason'=> $request->restore_reason,
                'modified_by' => generateFullName(session('LoggedUser'))
            ]);
        User::withTrashed()->find($id)->restore();
        saveActivityLog(generateFullName(session('LoggedUser')), "Restored user with ID#: ".$id);
        return response()->json(['success'=>'User account restored successfully.']);
    }

    
}
