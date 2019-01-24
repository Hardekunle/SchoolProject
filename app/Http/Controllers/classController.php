<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clas;
use Validator;

class classController extends Controller
{
    //the major functions include: 

    //Returning the view of class
    public function AddClassPage(){
        $class=clas::all();
        return view('class.add')->with('classInfo',$class);
    }

    //to add class
    public function AddClass(Request $request){

        $this->validate($request,[
            'class'=>'required',
            'teacher'=>'required'
        ]);

        $inputedClas=strtolower($request->input('class'));
        $inputedSec=strtolower($request->input('section'));
        $indentify=$inputedClas."".$inputedSec;
        $uniques=['unq'=>$indentify];
        
        //my custom validation
        $validator= Validator::make($uniques,['unq'=>'unique:clas,identify'],['unq.unique'=>'Class already Exist!!']);
        if ($validator->fails()) {
            return redirect('class/view')
            ->withErrors($validator)
            ->withInput();
            }
        
        $clas= new clas;
        $clas->class=$request->class;
        $clas->section = $request->section;
        $clas->teacher = $request->teacher;
        $clas->identify = $indentify;

        $clas->save();
        
        return redirect()->back()->with('success','Class has been added Successfully');

    }

    //To Edit Already Existing Class
    public function EditClass(Request $request){
        
        $this->validate($request,[
            'class'=>'required',
            'teacher'=>'required'
        ]);

        $inputedClas=strtolower($request->input('class'));
        $inputedSec=strtolower($request->input('section'));
        $indentify=$inputedClas."".$inputedSec;
        $uniques=['unq'=>$indentify];
        
        //my custom validation
        $validator= Validator::make($uniques,['unq'=>'unique:clas,identify'],['unq.unique'=>'Class already Exist!!']);
        if ($validator->fails()) {
            return redirect('class/view')
            ->withErrors($validator)
            ->withInput();
            }

        $Clas=Clas::findOrFail($request->catID);
        $Clas->class = $request->input('class');
        $Clas->section = $request->input('section');
        $Clas->identify=$indentify;
        $Clas->teacher = $request->input('teacher');
        $Clas->save();

        return redirect('/class/view')->with('success','Class has been Edited Successfully');    
    }

    //To delete the class
    public function DeleteClass(Request $request){
        $Clas=Clas::findOrFail($request->catID);
        $Clas->delete();
        return redirect('/class/view')->with('success','class has been deleted Successfully');
    }
}
