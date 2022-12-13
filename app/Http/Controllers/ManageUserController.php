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
use Crypt;
use DB;


class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
       $id = crypt::decrypt($id);

        if ($id == 1) {
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
        
        
        return view('inc.sysAdmin.admin.add')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms]);
    


        }


        elseif ($id == 2) {
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
        
        
        return view('inc.sysAdmin.buyer.add')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms]);

        }



        elseif ($id == 3) {
            # code...
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
        
        
        return view('inc.sysAdmin.clerks.add')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms]);
        }



        elseif ($id == 4) {
            # code...
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
        
        
        return view('inc.sysAdmin.officer.add')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms]);
        }


        
        elseif ($id == 5) {
            # code...
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
        
        
        return view('inc.sysAdmin.peasant.add')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms]);
        }
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



}
