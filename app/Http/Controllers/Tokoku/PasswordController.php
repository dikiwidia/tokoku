<?php

namespace App\Http\Controllers\Tokoku;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Hash;
use App\Http\Requests\Tokoku\UpdatePasswordRequest;

use App\User;

class PasswordController extends Controller
{
    private $home;

    public function __construct()
    {
        $this->middleware('auth');
        $this->home = route('home');
    }

    public function index(){
        return view('tokoku.password.index');
    }

    public function update(UpdatePasswordRequest $request){
        $password = $request->input('old-password');
        $data     = User::find(Auth::user()->id);
        $check    = Hash::check($password, $data->password);
        
        if($data != NULL){
            if($check == false){
                return redirect()->back()->with('status','Kata Sandi Lama tidak cocok !');
            }
            
            $data->password = bcrypt($request->input('password'));
            $data->save();
            Auth::logout();
        }
        return redirect($this->home);
    }
}
