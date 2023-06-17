<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Buyer;
use App\Models\Renter;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function showLogin($guard){
        return response()->view('cms.auth.login' , compact('guard'));
    }
    public function login(Request $request){

        $validator = Validator($request->all() ,[
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'

        ]);

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        if (!$validator->fails()) {
            if (Auth::guard($request->get('guard'))->attempt($credentials)) {
                return response()->json(['icon' => 'success', 'title' => 'Login is Successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Login is Failed '], 400);
            }
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }
    public function logout(Request $request){
        $guard = '';
        if (auth('admin')->check()){
            $guard = 'admin';
        }elseif (auth('supplier')->check()) {
            $guard = 'supplier';
        }elseif(auth('renter')->check()){
            $guard = 'renter';
        }else{
            $guard = 'buyer';
        }
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('view.login' , $guard);
        
    }
    
    public function changePassword(Request $request){
        $user ='';
        $validator = Validator($request->all() ,[
            'oldpassword' => 'required|string|email',
            'newpassword' => 'required|string|min:6'

        ]);
        if (auth('admin')->check()){
            $user= Admin::where('email', $request->email)->first();
        }elseif (auth('supplier')->check()) {
            $user= Supplier::where('email', $request->email)->first();
        }elseif(auth('renter')->check()){
            $user= Renter::where('email', $request->email)->first();
        }else{
            $user=Buyer::where('email', $request->email)->first();
        }
        if (!$validator->fails()) {
            if(!$user || !Hash::check($request->oldpassword, $user->password)) {
                return response()->json(['icon' => 'error', 'title' => 'Invalid Old Password'], 200);
            } else {
                $user->password = Hash::make($request->get('newpassword'))
                 ;
                return response()->json(['icon' => 'success', 'title' => 'Passwoed Changed Successfully '], 400);
            }
        } else {
        return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }
    
}