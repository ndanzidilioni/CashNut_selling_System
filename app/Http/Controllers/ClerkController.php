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

class ClerkController extends Controller
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
       
        return view('inc.clerk.home')->with(['messages'=>$messages,'number_of_sms'=> $number_of_sms,'users'=>$users,'users2'=>$users2]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

   // if statement that allow to call peasant profile on clerk page
      if ( $request->input('id') == 1) {

        $users = DB::table('users')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->join('bank_Details', 'users.id', '=', 'bank_Details.user_id')
            ->select('bank_Details.*', 'users.*', 'profiles.*')
            ->where('users.email',$request->input('email'))
            ->get();
       
        
        return view('inc.clerk.viewPeasant')->with(['users'=>$users]);
      }


         elseif ( $request->input('id') == 2) {


       
         $users = User::all()->where('email',$request->input('email'));
   
          foreach ($users as $key ) {
              $phone = profile::all()->where('user_id',$key->id);
              $bank = bankDetails::all()->where('user_id',$key->id);
          }

       return view('inc.clerk.addkilo')->with(['users'=>$users, 'phone'=> $phone,'bank'=>$bank]);
      }



         elseif ( $request->input('id') == 3) {
            $id2 =  deposits::all()->where('peasant_id',$request->input('peasant_id'));
            $i = 0;
            foreach ($id2 as  $value) {
          
            $i++;   
        }
          if( $i > 0 ) {
            
            return redirect('clerk')->with(['sam'=>'sam']);
          }
          else{
                  $cost1 = costs::where('grade',$request->input('select'))
                  ->select('cash')
                  ->get();
                  $cost = 0;
                 foreach ($cost1 as $value) {
                     $cost = $value->cash;
                 }
                  echo $cost;

                  
            $kilo =  (int)$request->input('kilo');
            $deposit = new deposits;
             $deposit->clerk_id = Auth::user()->id;
             $deposit->peasant_id = $request->input('peasant_id');
             $deposit->capacity = $request->input('kilo');
             $deposit->amount = $cost * $kilo ;
             $deposit->Grade = $request->input('select');
             $deposit->status = 1;
             $deposit->save();

        //      $totalkg = new totalkilos;
        // $totalkg->total_kilo = 0;
        // $totalkg->clerk_id = $user->id;
        // $totalkg->save();

        $totalkilo =  totalkilos::all()->where('clerk_id',Auth::user()->id);
        $jumla = 0;
        foreach ($totalkilo as  $value) {
            $jumla = $value->total_kilo + $kilo;
        }
         
        
             DB::table('totalkilos')
                 ->where('clerk_id',Auth::user()->id)
                 ->update(['total_kilo'=> $jumla]);






             

             return redirect('clerk');


         }

        

      

         }
       
      elseif ( $request->input('id') == 0) {
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

        $totalkg = new totalkilos;
        $totalkg->total_kilo = 0;
        $totalkg->clerk_id = $user->id;
        $totalkg->save();
        
        $userRoles = User::find($user->id);
        $userRoles->roles()->attach(3);  



            
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
        
        
        return view('inc.sysAdmin.clerks.home')->with(['users'=>$users,'users2'=>$users,'messages'=>$messages,'number_of_sms'=>$number_of_sms,'error'=>1]);
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
