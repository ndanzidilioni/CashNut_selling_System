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


class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $messages = messages::all()->where('receiver_id', Auth::user()->id); 
        //  $number_of_sms = 1;
        //  foreach ($messages as  $value) {
        //      if($value->status == 1){
        //         $number_of_sms++;
        //      }
        //  }
        // return view('inc.clerk.message')->with(['number_of_sms'=>$number_of_sms]);

        //->with(['deposit'=>$deposit, 'peasant'=> $peasant,'bank'=>$bank,'messages'=>$messages,'number_of_sms'=> $number_of_sms]);

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

        $messages = new messages;

        $messages->body =   $request->input('body');
        $messages->sender_id =   Auth::user()->id;
        $messages->receiver_id = $request->input('receiver_id');
        $messages->status = 1;
        $messages->name = Auth::user()->name;

         $messages->save();


          $users = DB::table('users')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->join('locations', 'users.id', '=', 'locations.user_id')
            ->where('users.id',$request->input('receiver_id'))
            ->get();

         $messages = DB::table('messages')
                                    ->where([['receiver_id', Auth::user()->id],['sender_id', $request->input('receiver_id')]])
                                     ->orwhere([['receiver_id',$request->input('receiver_id')],['sender_id',Auth::user()->id] ])
                                     ->orderBy('created_at', 'asc')
                                    ->get();
         $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }
        return view('inc.messages.home')->with(['number_of_sms'=>$number_of_sms,'messages'=>$messages,'receiver_id'=>$request->input('receiver_id'),'users'=>$users]);


        
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
           $messages = messages::all()->where('receiver_id', Auth::user()->id); 
         $number_of_sms = $id;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }
        return view('inc.messages.home')->with(['number_of_sms'=>$number_of_sms]);
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
    public function destroy($secsw){
        DB::table('messages')->where([['receiver_id', Auth::user()->id],['sender_id', crypt::                   decrypt($secsw)]])
                           ->orwhere([['receiver_id',crypt::decrypt($secsw)],['sender_id',Auth::user()->id] ])
                           ->delete();

         $users = DB::table('users')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->join('locations', 'users.id', '=', 'locations.user_id')
         //    ->select('locations.*', 'users.*', 'profiles.*')
        //$users = DB::table('users')
           // ->where('users.id',crypt::decrypt($secsw))
            ->where('users.id',crypt::decrypt($secsw))
            ->get();


          $messages = DB::table('messages')
                                    ->where([['receiver_id', Auth::user()->id],['sender_id', crypt::decrypt($secsw)]])
                                     ->orwhere([['receiver_id',crypt::decrypt($secsw)],['sender_id',Auth::user()->id] ])
                                     ->orderBy('created_at', 'asc')
                                    ->get(); 
                                   
         $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }
        return view('inc.messages.home')->with(['number_of_sms'=>$number_of_sms,'messages'=>$messages,'receiver_id'=>crypt::decrypt($secsw),'users'=>$users]);


    }

    public function viewsms($secsw)

    {

          $users = DB::table('users')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->join('locations', 'users.id', '=', 'locations.user_id')
            ->where('users.id',crypt::decrypt($secsw))
            ->get();


          $messages = DB::table('messages')
                                    ->where([['receiver_id', Auth::user()->id],['sender_id', crypt::decrypt($secsw)]])
                                     ->orwhere([['receiver_id',crypt::decrypt($secsw)],['sender_id',Auth::user()->id] ])
                                     ->orderBy('created_at', 'asc')
                                    ->get(); 
                                   
         $number_of_sms = 0;
         foreach ($messages as  $value) {
             if($value->status == 1){
                $number_of_sms++;
             }
         }


         $user2 = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'users.id', '=', 'role_user.user_id')
           // ->where('users.id',crypt::decrypt($secsw))
            ->get();
        return view('inc.messages.home')->with(['number_of_sms'=>$number_of_sms,'messages'=>$messages,'receiver_id'=>crypt::decrypt($secsw),'users'=>$users]);
        
    }
}
