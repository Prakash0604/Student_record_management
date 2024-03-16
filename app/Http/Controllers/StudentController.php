<?php

namespace App\Http\Controllers;

use App\Models\classroom;
use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function studentadd(){
        $classroom=classroom::all();
        return view('Students.StudentAdd',compact('classroom'));
    }
    public function studentstore(Request $request){
        $request->validate([
            'stu_name'=>'required',
            'stu_email'=>'required|email',
            'stu_address'=>'required',
            'stu_contact'=>'required|min:10',
            'gender'=>'required',
            'stu_dob'=>'required',
            // 'stu_profile'=>'sometimes|mimes:png,jpg',
        ]);
        // dd($request->all());
        $images=$request->stu_profile;
        if($images!=""){
            $exe=$images->getclientOriginalName();
            $images->storeAs('/public/images',$exe);
        }
        $students=student::insert([
            'stu_name'=>$request->stu_name,
            'stu_email'=>$request->stu_email,
            'stud_address'=>$request->stu_address,
            'stu_contact'=>$request->stu_contact,
            'gender'=>$request->gender,
            'stu_dob'=>$request->stu_dob,
            'stu_profile'=>$exe,
            'stu_class'=>$request->stu_class,
            'status'=>$request->status,
            'stu_desc'=>$request->stu_desc,
        ]);
        return redirect('/student/add')->with('stuadd','Student has been added successfully');
    }
    public function studentview(){
        $students=student::all();
        return view('Students.StudentList',compact('students'));
    }
}
