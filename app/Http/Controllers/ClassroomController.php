<?php

namespace App\Http\Controllers;

use App\Models\classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function loadclassroom(){
        $classroom=classroom::all();
        return view('Grade.Classroom',compact('classroom'));
    }
    public function storeclassroom(Request $request){
        $request->validate([
            'class_name'=>'required|unique:classrooms',
            'class_desc'=>'required',
        ]);
        $classroom=classroom::insert([
            'class_name'=>$request->class_name,
            'class_desc'=>$request->class_desc,
            'status'=>$request->status,
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        return redirect('/classroom')->with('classadd','Classroom added successfully');
    }
    public function classroomedit($id){
        $classroom=classroom::find($id);
        return view('Grade.Edit',compact('classroom'));
    }
    public function classroomupdate(Request $request,$id){
        $classroom=classroom::where('id',$id)->update([
            'class_name'=>$request->class_name,
            'class_desc'=>$request->class_desc,
            'status'=>$request->status,
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        return redirect('/classroom')->with('classupdate','Classroom Updated successfully');
    }
    public function classroomview(){
        $classroom=classroom::all();
        return view('Grade.Classroomview',compact('classroom'));
    }
    public function classroomdelete($id){
        $classroom=classroom::find($id);
        if(!empty($classroom)){
            $classroom->delete();
            return back()->with('classdelete','Classroom has been deleted');
        }else{
            return back()->with('classdelete','Classroom already deleted');
        }
    }
}
