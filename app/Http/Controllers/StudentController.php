<?php

namespace App\Http\Controllers;

use App\Models\classroom;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $exe=null;
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
    public function studentdetail($id){
        $studentdetail=student::find($id);
        $classroom=DB::table('students')->join('classrooms','students.stu_class','=','classrooms.id')->select('classrooms.class_name')->where('students.id', $id)->get();
        return view('Students.StudentDetail',compact('studentdetail','classroom'));
    }
    public function studentedit($id){
        $classroom=classroom::all();
        $students=student::find($id);
        $classrooms=DB::table('students')->join('classrooms','students.stu_class','=','classrooms.id')->select('classrooms.class_name')->where('students.id', $id)->get();
        return view('Students.StudentEdit',compact('students','classroom','classrooms'));
    }
    public function studentupdate( Request $request,$id){
        $request->validate([
            'stu_name'=>'required',
            'stu_email'=>'required|email',
            'stu_address'=>'required',
            'stu_contact'=>'required|min:10',
            'gender'=>'required',
            'stu_dob'=>'required',
        ]);

        $images=$request->stu_profile;
        $exe=null;
        if($images!=""){
            $exe=$images->getclientOriginalName();
            $images->storeAs('/public/images',$exe);
        }else{
            $students=student::find($id)->update([
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
        }
        return redirect('/student/view')->with('stuupdate','Student has been Updated successfully');
    }
    public function studentdelete($id){
        $delete=student::find($id);
        if($delete!=""){
            $delete->delete();
            return back()->with('delete','Student has been deleted');
        }
    }
}
