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
use App\totalkilos;
use App\costs;
use DB;


class PeasantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()


    {


        $users2 = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->select('users.id','users.name','users.email','roles.role_name')
           // ->where('users.id',crypt::decrypt($secsw))
            ->get();

  $users = DB::table('deposits')
            ->join('users', 'deposits.peasant_id', '=', 'users.id')
            ->join('bank_Details', 'deposits.peasant_id', '=', 'bank_Details.user_id')
            ->select('users.id', 'users.name', 'users.email', 'bank_Details.bankName', 'bank_Details.AcNumber','deposits.peasant_id','deposits.clerk_id','deposits.capacity','deposits.peasant_id','deposits.amount','deposits.status')
            ->where('clerk_id', Auth::user()->id)
            ->get();


         $messages = messages::all()->where('receiver_id', Auth::user()->id); 
         $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }
       
        //return view('inc.clerk.home')->with(['messages'=>$messages,'number_of_sms'=> $number_of_sms,'users'=>$users,'users2'=>$users2]);
      

       
         $users = User::all()->where('id',Auth::user()->id);
         foreach ($users as $key ) {
             $deposit = deposits::all()->where('peasant_id', $key->id);
             $banks = bankdetails::all()->where('user_id',$key->id);
             $profile = profile::all()->where('user_id',$key->id);
             
         }
           return view('inc.peasant.home')->with(['messages'=>$messages,'number_of_sms'=> $number_of_sms,'users'=>$users,'users2'=>$users2, 'deposit'=> $deposit,'bank'=>$banks,'profile'=>$profile]);
         
       // return view('inc.peasant.home')->with(['users' => $users,'users2' => $users, 'deposit'=> $deposit,'bank'=>$banks,'profile'=>$profile]);
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
