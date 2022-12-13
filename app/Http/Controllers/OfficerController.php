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
use App\payments;
use App\bankDetails;
use App\deposits;
use App\messages;
use App\totalkilos;
use Crypt;
use App\costs;
use DB;
class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $users = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->join('Locations', 'locations.user_id', '=', 'role_user.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'role_user.user_id')
            ->select('users.id','roles.role_name','profiles.phone','users.name','users.email','locations.region','locations.district')
           // ->where('users.id',crypt::decrypt($secsw))
            ->get();


             $payments = DB::table('users')
            ->join('payments', 'users.id', '=', 'payments.buyer_id')
            ->get();


          $messages = messages::all()->where('receiver_id', Auth::user()->id); 
         $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }


          
      
        
        
        return view('inc.officer.home')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms,'payments'=>$payments]);
       // return view('inc.sysAdmin.officer.home')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('inc.sysAdmin.officer.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $userRoles->roles()->attach(4); 


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
        
        
        return view('inc.sysAdmin.officer.home')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms,'error'=>1]);  
            
        
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
    }
    public function confirm($id,$peasant_id){
        $k =  
  

  //echo crypt::decrypt($peasant_id);

               $k =  DB::table('payments')
                     ->where('id',crypt::decrypt($id))
                     ->update(['status'=> 2]);

                     if($k){


               $j = DB::table('deposits')
                     ->where('peasant_id',crypt::decrypt($peasant_id))
                     ->update(['status'=> 2]);


                     if($j){
                       return redirect('officer');
                           }
                       
                     }


    }
    public function peasantInformation(){
            
               $users2 = DB::table('users')
            ->join('deposits', 'users.id', '=', 'deposits.peasant_id')
             ->join('bank_details', 'users.id', '=', 'bank_details.user_id')
              ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->get();


// $users = User::all();
//          foreach ($users as $key ) {
//              $deposit = deposits::all()->where('peasant_id', $key->id);
//              $banks = bankdetails::all()->where('user_id',$key->id);
//              $profile = profile::all()->where('user_id',$key->id);
             
//          }
           
         
        return view('inc.officer.userinfo')->with(['users' => $users2,'users2' => $users2]);

    }
}
