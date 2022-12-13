<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Location;
use App\User;
use App\Profile;
use App\Role;
use App\bankDetails;
use App\deposits;
use App\messages;
use App\costs;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                  
    $users = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->join('Locations', 'locations.user_id', '=', 'role_user.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'role_user.user_id')
            ->select('users.id','roles.role_name','profiles.phone','users.name','users.email','locations.region','locations.district')
           // ->where('users.id',crypt::decrypt($secsw))
            ->get();


          $messages = messages::all()->where('receiver_id', Auth::user()->id); 
         $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }


          
      
        
        
        return view('inc.sysAdmin.home')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms]);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('inc.sysAdmin.admin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->input('id') == 1) {


            $costs = new costs;
            $costs->grade =  $request->input('select');
            $costs->cash = $request->input('cost');
            $costs->save();
             return redirect('admin');
        }
        elseif($request->input('id') == 2){

    
         $user = new User;
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make(1234);
        $user->save();
         
        
        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->phone = $request->input('phone');
        $profile->save();


        $userLocation = new Location;
        $userLocation->user_id = $user->id;
        $userLocation->region = $request->input('region');
        $userLocation->district = $request->input('district');
        $userLocation->ward = $request->input('ward');
        $userLocation->save();
        
        $userRoles = User::find($user->id);
        $userRoles->roles()->attach(5);
       
         $userRoles->save();

        // $paswdStatus = new paswdStatus;
        // $paswdStatus->user_id = $user->id; 
        //  $paswdStatus->status = 2; 
        //    $paswdStatus->save();


            $messages = messages::all()->where('receiver_id', Auth::user()->id); 
        $number_of_sms = 0;
                foreach ($messages as  $value) 
                {
                        if($value->status == 1){
                         $number_of_sms++;   }
                
                }
        $users = User::all();

            $users = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->join('Locations', 'locations.user_id', '=', 'role_user.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'role_user.user_id')
           // ->where('users.id',crypt::decrypt($secsw))
            ->get();
        
        
        return view('inc.sysAdmin.admin.home')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms,'error'=>1]);
    
       }
            
       
       

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
          $messages = messages::all()->where('receiver_id', Auth::user()->id); 
         $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }


          $users = User::all();
      
        
        
        return view('inc.sysAdmin.home')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms]);
    }
    public function viewAdmin()
    {
        //
          $users = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->join('Locations', 'locations.user_id', '=', 'role_user.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'role_user.user_id')
           // ->where('users.id',crypt::decrypt($secsw))
            ->get();


          $messages = messages::all()->where('receiver_id', Auth::user()->id); 
         $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }


         //$users = User::all();
      
        
        
        return view('inc.sysAdmin.admin.home')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms]);
    }
     public function viewBuyer()
    {
        //
          $messages = messages::all()->where('receiver_id', Auth::user()->id); 
         $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }


            $users = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->join('Locations', 'locations.user_id', '=', 'role_user.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'role_user.user_id')
           // ->where('users.id',crypt::decrypt($secsw))
            ->get();
      
        
        
        return view('inc.sysAdmin.buyer.home')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms]);
    }
     public function viewClerk()
    {
        //
          $messages = messages::all()->where('receiver_id', Auth::user()->id); 
         $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }


            $users = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->join('Locations', 'locations.user_id', '=', 'role_user.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'role_user.user_id')
           // ->where('users.id',crypt::decrypt($secsw))
            ->get();
      
        
        
        return view('inc.sysAdmin.clerks.home')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms]);
    }
     public function viewPeasant()
    {
        //
         $messages = messages::all()->where('receiver_id', Auth::user()->id); 
         $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }


            $users = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->join('Locations', 'locations.user_id', '=', 'role_user.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'role_user.user_id')
           // ->where('users.id',crypt::decrypt($secsw))
            ->get();
        
        
        return view('inc.sysAdmin.peasant.home')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms]);
    }
     public function viewOfficer()
    {
        //
                $messages = messages::all()->where('receiver_id', Auth::user()->id); 
          $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }


      $users = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->join('Locations', 'locations.user_id', '=', 'role_user.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'role_user.user_id')
           // ->where('users.id',crypt::decrypt($secsw))
            ->get();
        
      
        
        
        return view('inc.sysAdmin.officer.home')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms]);
    }
    

     public function addpage()
    {
        //
                $messages = messages::all()->where('receiver_id', Auth::user()->id); 
          $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }

      $option  = array('op1' =>1 ,'op2' =>2,'op3' =>3 );
      $users = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->join('Locations', 'locations.user_id', '=', 'role_user.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'role_user.user_id')
           // ->where('users.id',crypt::decrypt($secsw))
            ->get();
        
      
        
        
        return view('inc.sysAdmin.addcost')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms,'option'=>$option]);
    }

     public function saveCost(Request $request)
    {

    }


}
