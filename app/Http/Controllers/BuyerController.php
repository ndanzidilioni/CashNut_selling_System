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
use Crypt;
use App\messages;
use App\payments;
use DB;

class BuyerController extends Controller
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

            ->join('deposits', 'deposits.clerk_id', '=', 'role_user.user_id')
            ->join('totalkilos', 'totalkilos.clerk_id', '=', 'role_user.user_id')
            ->join('Locations', 'locations.user_id', '=', 'role_user.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'role_user.user_id')
            ->select('users.id','roles.role_name','profiles.phone','users.name','users.email','locations.region','locations.district','deposits.Grade','deposits.clerk_id','deposits.capacity','deposits.peasant_id','totalkilos.total_kilo','status')
            ->orderBy('status','asc')
           // ->where('users.id',crypt::decrypt($secsw))
            ->get();


             $users2 = DB::table('deposits')
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


          
      
        
        
        return view('inc.buyer.home')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms]);
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
        if ($request->input('id') == 1) {

           


               // $payment = new payments;
               // $payment->peasant_id = $request->input('peasant_id');

               // $payment->buyer_id = Auth::user()->id;
               // $payment->amount = $request->input('cost');
               // $payment->kilo = $request->input('kilo');
               // $payment->status = 1;

               // $payment->save();


             DB::table('deposits')
                 ->where('peasant_id',$request->input('peasant_id'))
                 ->update(['status'=> 3]);





             $users = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'users.id', '=', 'role_user.user_id')

            ->join('deposits', 'deposits.clerk_id', '=', 'role_user.user_id')
            ->join('totalkilos', 'totalkilos.clerk_id', '=', 'role_user.user_id')
            ->join('Locations', 'locations.user_id', '=', 'role_user.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'role_user.user_id')
            ->select('users.id','roles.role_name','profiles.phone','users.name','users.email','locations.region','locations.district','deposits.Grade','deposits.clerk_id','totalkilos.total_kilo','deposits.capacity')
           // ->where('users.id',crypt::decrypt($secsw))
            ->get();

             $messages = messages::all()->where('receiver_id', Auth::user()->id); 
         $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }

         $payments = payments::all()->where('buyer_id', Auth::user()->id);

       // $cost =  crypt::decrypt($secsw);
                                 
       // $id = crypt::decrypt($id);
        //
      return view('inc.buyer.sliplist')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms,'payment'=>$payments,'error'=>1]);
        }
        //
       // echo "string1";
        echo $request->input('peasant_id');
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

    public function showInfo($secsw,$id,$kilo){
           $users = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'users.id', '=', 'role_user.user_id')

            ->join('deposits', 'deposits.clerk_id', '=', 'role_user.user_id')
            ->join('totalkilos', 'totalkilos.clerk_id', '=', 'role_user.user_id')
            ->join('Locations', 'locations.user_id', '=', 'role_user.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'role_user.user_id')
            ->select('users.id','roles.role_name','profiles.phone','users.name','users.email','locations.region','locations.district','deposits.Grade','deposits.clerk_id','totalkilos.total_kilo')
           // ->where('users.id',crypt::decrypt($secsw))
            ->get();

             $messages = messages::all()->where('receiver_id', Auth::user()->id); 
         $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }

        $cost =  crypt::decrypt($secsw);
                                 
        $id = crypt::decrypt($id);


        $kilo = crypt::decrypt($kilo);

         
        //
      return view('inc.buyer.paymentInfo')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms,'cost'=>$cost,'id'=>$id,'kilo'=>$kilo]);


    }

    public function viewslip(){

            $users = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'users.id', '=', 'role_user.user_id')

            ->join('deposits', 'deposits.clerk_id', '=', 'role_user.user_id')
            ->join('totalkilos', 'totalkilos.clerk_id', '=', 'role_user.user_id')
            ->join('Locations', 'locations.user_id', '=', 'role_user.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'role_user.user_id')
            ->select('users.id','roles.role_name','profiles.phone','users.name','users.email','locations.region','locations.district','deposits.Grade','deposits.clerk_id','totalkilos.total_kilo','deposits.capacity')
           // ->where('users.id',crypt::decrypt($secsw))
            ->get();

             $messages = messages::all()->where('receiver_id', Auth::user()->id); 
         $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }

        $payments = payments::all()->where('buyer_id', Auth::user()->id);
        //
      return view('inc.buyer.sliplist')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms,'payment'=>$payments]);


    }


    

    public function dowloads($id){

         $users = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'users.id', '=', 'role_user.user_id')

            ->join('deposits', 'deposits.clerk_id', '=', 'role_user.user_id')
            ->join('totalkilos', 'totalkilos.clerk_id', '=', 'role_user.user_id')
            ->join('Locations', 'locations.user_id', '=', 'role_user.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'role_user.user_id')
            ->select('users.id','roles.role_name','profiles.phone','users.name','users.email','locations.region','locations.district','deposits.Grade','deposits.clerk_id','totalkilos.total_kilo','deposits.capacity')
           // ->where('users.id',crypt::decrypt($secsw))
            ->get();

             $messages = messages::all()->where('receiver_id', Auth::user()->id); 
         $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }

        $payments = payments::all()->where('id',crypt::decrypt($id));
        //
      return view('inc.buyer.payslip')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms,'payment'=>$payments]);

    }

}
