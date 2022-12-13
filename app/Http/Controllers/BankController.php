<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Validator;
use App\Location;
use App\User;
use App\Profile;
use App\Role;
use App\bankDetails;
use App\businessInfo;
use DB;
class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return view('home');
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

        $profile = new Profile;
        $profile->user_id = Auth::user()->id;
        $profile->phone = $request->input('phone');
        $profile->save();


        $userBankInfo = new bankDetails;
        $userBankInfo->AcNumber = $request->input('Anumber');
        $userBankInfo->acName = $request->input('Aname');
        $userBankInfo->bankName = $request->input('Bname');
        $userBankInfo->user_id = Auth::user()->id;
        $userBankInfo->save();

        //cheking if user is a buyer
         if($request->input('id') == 2){
        
        $businessInfo = new businessInfo;
        $businessInfo->user_id = Auth::user()->id;
        $businessInfo->tinNumber = $request->input('tax');
        $businessInfo->businessID = $request->input('bln');
        $businessInfo->save();
            
           }
        
           
            
        return redirect('home');
     
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
           $userpassword = user::find($id);
        $userpassword->password = $request->input('password');
         
        $userpassword->save();
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
