<?php

namespace App\Http\Controllers\Auth;

use App\Location;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'phone' => ['min:10', 'max:20', 'unique:users'],
            'name' => ['required', 'max:255'],

            'region' => ['required',  'max:255'],   
            'district' => ['required',  'max:255'],
            'ward' => ['required', 'max:255'],

            'option' => ['required'],

            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
         
        $userLocation = new Location;
        $userLocation->user_id = $user->id;
        $userLocation->region = $data['region'];
        $userLocation->district = $data['district'];
        $userLocation->ward = $data['ward'];
        $userLocation->save();
            
        // bu
        if($data['option'] == 'Peasant'){
            $userRoles = User::find($user->id);
            $userRoles->roles()->attach(1);     
           
        }
        else{
            $userRoles = User::find($user->id);
            $userRoles->roles()->attach(2);     
           
        }
        // roles
        //buyer = 1
        // peasant = 2
        // crerk = 3
        // market officer = 4
        // sysAdmin = 5
                return $user;
       // return redirect('clerk');

    }
}
