<?php

namespace App\Http\Controllers\Vaxtracing;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Vaxtracing\Person;
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
            $data = User::join('people', 'users.id', '=', 'people.user_id')->where('users.deleted_at', NULL)->where('users.id','!=', session('LoggedUser')->id)
            ->select('*','users.id as user_id','users.deleted_at as user_status',DB::raw("CONCAT(first_name , ' ' , middle_name , ' ' , last_name, ' ' , suffix) as full_name"))->withTrashed()->get();
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "";
               
                    if($row->user_status == null){
                         $actionBtn = "     
                                    <a class='view btn btn-alt-primary mr-5 mb-5' onclick='show_people($row->user_id)'><i class='si si-eye mr-5'></i>View</button></a>
                                    <a href='".route('update_people', $row->user_id)."' class='update btn btn-alt-success mr-5 mb-5'><i class='si si-pencil mr-5'></i>Update</a>
                                    <a class='delete delete btn btn-alt-danger mr-5 mb-5' onclick='delete_people($row->user_id)'><i class='si si-trash mr-5'></i>Delete</a>
                        ";
                    }else {
                        $actionBtn = "
                                     <a class='view btn btn-alt-primary mr-5 mb-5' onclick='show_people($row->user_id)'><i class='si si-eye mr-5'></i>View</button></a>
                                    <a href='".route('update_people', $row->user_id)."' class='update btn btn-alt-success mr-5 mb-5'><i class='si si-pencil mr-5'></i>Update</a>
                                    <a class='delete btn btn-alt-warning mr-5 mb-5' onclick='restore_people($row->user_id)'><i class='si si-settings mr-5'></i>Restore</a>
                        ";
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
            ->select('*','users.id as user_id','users.deleted_at as user_status',DB::raw("CONCAT(first_name , ' ' , middle_name , ' ' , last_name, ' ' , suffix) as full_name"))->withTrashed()->get();
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $actionBtn = "<a class='delete btn btn-alt-warning mr-5 mb-5' onclick='restore_people($row->user_id)'><i class='si si-settings mr-5'></i>Restore</a>";
                    
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
            ->select('*','users.id as user_id','users.deleted_at as user_status',DB::raw("CONCAT(first_name , ' ' , middle_name , ' ' , last_name, ' ' , suffix) as full_name"))->get();
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "";

                        $actionBtn = "<a class='delete btn btn-alt-danger mr-5 mb-5' onclick='delete_people($row->user_id)'><i class='si si-trash mr-5'></i>Delete</a>";
                    
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getDashboardData(Request $request){

        DB::statement("SET SQL_MODE=''"); // set the strict to false

        $total_user = User::count();

        return view('Vaxtracing.admin.index', compact('total_user'));
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
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
    }

 
    public function show($id)
    {
        $users = User::with('person')->where('id', $id)->first();

        return response()->json($users);
    }

   
    public function edit($id)
    {
        $users = User::with('person')->where('id', $id)->first();
        
        return view('Vaxtracing.admin.UpdatePerson.index',compact('users'));
    }

   
    public function update(Request $request, $id)
    {
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
            ]);
        
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

    }
    
    public function destroy(Request $request, $id)
    {
        $request -> validate([
            'reason1' => 'required',
        ]);
        $user = User::where('id', $id)
            ->update([
                'reason'=> $request->reason1,
                'modified_by' => generateFullName(session('LoggedUser'))
            ]);
        User::find($id)->delete();
        
        return response()->json(['success'=>'User account deleted successfully.']);
    }

    public function restore(Request $request, $id)
    {
        $request -> validate([
            'restore_reason' => 'required',
        ]);
        $user = User::withTrashed()->where('id', $id)
            ->update([
                'reason'=> $request->restore_reason,
                'modified_by' => generateFullName(session('LoggedUser'))
            ]);
        User::withTrashed()->find($id)->restore();
        
        return response()->json(['success'=>'User account restored successfully.']);
    }
}
