<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function loadregister()
    {
        return view('UserRegister');
    }
    public function storeregister(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'cpassword'=>'required|same:password'
        ]);
        // dd($request->all());
        $token=Str::random(50);
        // $userslist=User::where('remember_token',$token);
        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'remember_token'=>$token,
        ]);
        $domain=URL::to('/');
        $data['url']=$domain.'/remember-token/'.$token;
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=$request->password;
        $data['title']="Email Verification";
        Mail::send('mail.verify',['data'=>$data],function($message) use($data){
            $message->to($data['email'])->subject($data['title']);
        });
        return redirect('/register')->with('success','You have register successfully please verify your email now');
    }
    public function verifynow($token){
        $users=User::where('remember_token',$token)->get();
        if(count($users)){
            if($users[0]['is_verified']==1){
                return view('mail.verifyit',['message'=>'Email Already verified']);
            }
            $verify=User::where('id',$users[0]['id'])->update([
                'is_verified'=>1,
                'email_verified_at'=>date('Y-m-d H:i:s'),
            ]);
            return redirect('/login')->with('verification','Verification completed now you can login');
        }else{
            return view('mail.verifyit',['message'=>'Invalid token']);
        }
    }
    public function loadlogin(){
        return view('Login');
    }
}
