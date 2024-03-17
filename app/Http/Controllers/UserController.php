<?php

namespace App\Http\Controllers;

use App\Models\classroom;
use App\Models\student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function loadregister()
    {
        if(session()->has('email')){
            return redirect('/dashboard');
        }
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
        if(session()->has('email')){
            return redirect('/dashboard');
        }
        return view('Login');
    }
    public function storelogin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $Users=User::where('email',$request->email)->get();
        if($Users->count()){

            if($Users[0]['is_verified']==0){
                return back()->with('message','Email is not verified yet');
            }else{
                $Auth=$request->only('email','password');
                if(Auth::attempt($Auth)){
                   $request-> session()->put('email',$request->email);
                    return redirect('/dashboard')->with('success','Welcome to Dashboard '.$request->email);
                }
                else{
                    return back()->with('message','Invalid login crediantials');
                }
            }
        }else{
            return back()->with('message','Please register your email to login');
        }
    }
    public function dashboard(){
        $studentcount=student::where('status','Active')->count();
        $inactivestudent=student::where('status','Inactive')->count();
        $totalstu=student::count();
        $totalclass=classroom::count();
        $activeclass=classroom::where('status','Active')->count();
        $inactiveclass=classroom::where('status','Inactive')->count();
        $data=compact('studentcount','totalstu','totalclass','activeclass','inactivestudent','inactiveclass');
        return view('Students.dashboard',$data);
    }
    public function logout(){
        // if(session()->has('email')){
            session()->forget('email');
            return redirect('/login');
        // }
    }
    
}
