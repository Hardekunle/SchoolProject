<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Student;
use Mail;
use App\Mail\senderMail;
use App\Teacher;
use App\Timetable;
use App\Clas;
use App\Subject;
use App\Announce;
use App\Message;
use App\Rules\check;

class schoolController extends Controller
{
    //Admin
    public function AdminDash(){
        $announce=Announce::where('type','ADMISSION')->get();
        $announcem=Announce::where('type','ACADEMIC')->get();
        $announceme=Announce::where('type','SPORT')->get();
        $student=count(Student::all());
        $teacher=count(Teacher::all());
        $message=count(Message::all());
        return view('Admin.dashboard')->with(compact('announce','announcem','announceme','student','teacher','message'));
    }
    public function messageSend(){
        return view('messages.send');
    }
    //to view and Add Students
    public function addStudent(Request $request){
        
            $this->validate($request,[
                
                'firstname'=>'required',
                'lastname'=>'required',
                'gender'=>'required',
                'date_of_birth'=>'required',
                'email'=>'unique:students,email',
                'Sponsor_Email'=>'required|unique:student_parents,email2',
                'sponsor_name'=>'required',
                'reg_no'=>'required|unique:student_academics,reg_no',
                'class'=>'required',
                'section'=>'required',
            ]);
            $student=new Student;
            $student->first_name= $request->input('firstname');
            $student->middle_name= $request->input('middlename');
            $student->last_name= $request->input('lastname');
            $student->gender= $request->input('gender');
            $student->email= $request->input('email');
            $student->d_B= $request->input('date_of_birth');
            $student->religion= $request->input('religion');

            $studentParent=new studentParent;
            $studentParent->sponsor_name= $request->input('sponsor_name');
            $studentParent->occupation= $request->input('occupation');
            $studentParent->phone1= $request->input('phone1');
            $studentParent->phone2= $request->input('phone2');
            $studentParent->email2= $request->input('Sponsor_Email');
            $studentParent->address= $request->input('address');
            $studentParent->zipcode= $request->input('zipcode');

            
            

            $studentAcademic=new studentAcademic;
            $studentAcademic->reg_no= $request->input('reg_no');
            $studentAcademic->class= $request->input('class');
            $studentAcademic->section= $request->input('section');
            $studentAcademic->entry_date=$request->input('entry_date');
            $studentAcademic->club=$request->input('club');


            $student->save();
            $studentParent->student_id= $student->id;
            $studentAcademic->student_id=$student->id;
            $studentParent->save();
            $studentAcademic->save();

            return redirect('/viewStudents')->with('success','Details Submitted Successfully');
        

    }
    public function viewStudent(){
        return view('Student.add');
    }
    public function viewList(){
        $list= Student::all();
        return view('Student.viewList')->with('list',$list);
    }
    public function editPage($id){
        $id=student::find($id);
        return view('Student.editPage');
    }
    public function sendMail(){
        Mail::send(new senderMail());
        return('sent successfully');
    }



    public function addTeacherDetails(Request $request){
        $this->validate($request,[
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email',
            'address'=>'required',
        ]);
        $TeacherPersonal=new TeacherPersonal;
        $TeacherPersonal->title = $request->input('title');
        $TeacherPersonal->firstName=$request->input('firstName');
        $TeacherPersonal->lastName=$request->input('lastName');
        $TeacherPersonal->gender=$request->input('gender');
        $TeacherPersonal->teacherDOB=$request->input('teacherDOB');
        $TeacherPersonal->email=$request->input('email');
        $TeacherPersonal->religion=$request->input('religion'); 
        $TeacherContact->address =$request->input('address');
        $TeacherContact->address_2=$request->input('address_2');
        $TeacherContact->phoneNo=$request->input('phoneNo');
        $TeacherContact->state=$request->input('state');
        $TeacherContact->zip=$request->input('zip');
        $TeacherContact->maritalStatus=$request->input('maritalStatus');
        $TeacherAcademic->degree=$request->input('degree');
        $TeacherAcademic->university=$request->input('university');
        $TeacherAcademic->course=$request->input('course');
        $TeacherAcademic->grade=$request->input('grade');

        return('successful');
    }


//Timetable Controller
    public function TimeCreate(){
        $post= Timetable::all();
        return view('Timetable.add')->with('post',$post); 
    }

    public function TimeAddition(Request $request){
        $this->validate($request,[
            'day'=>'required',
            'slot'=>'required',
            'class'=>'required',
            'section'=>'required',
            'subject'=>'required',
            'teacher'=>'required'
        ]);

        $timetable = new Timetable;
        $timetable->day = $request->input('day');
        $timetable->slot = $request->input('slot');
        $timetable->class = $request->input('class');
        $timetable->section = $request->input('section');
        $timetable->subject = $request->input('subject');
        $timetable->teacher = $request->input('teacher');
        $timetable->room = $request->input('room');
        $timetable->save();
        
        $post= Timetable::all();
        return view('Timetable.add')->with('post',$post);

    }

    public function TimeEdit(Request $request){
        $timetable=timetable::findOrFail($request->catID);
        $timetable->day = $request->input('day');
        $timetable->slot = $request->input('slot');
        $timetable->class = $request->input('class');
        $timetable->section = $request->input('section');
        $timetable->subject = $request->input('subject');
        $timetable->teacher = $request->input('teacher');
        $timetable->room = $request->input('room');
        $timetable->save();

        return redirect('/timetable/create');
        
    }
    public function timeDelete(Request $request){
        $timetable=timetable::findOrFail($request->catID);
        $timetable->delete();
        return redirect('/timetable/create');
    }
    
    public function timeViewPage(){
        $post= timetable::all();
        return view('timetable.view')->with('post',$post);
    }

    public function timeVIEW(Request $request){
        $class=$request->input('class');
        $section= $request->input('section');
        
        $post= timetable::where('class',$class)->where('section',$section)->get();

        return view('timetable.view')->with('post',$post);
    }



    //Subject Controller
    public function subjectView(){
        $post= Subject::all();
        $class=Clas::all();
        $teacher=Teacher::all();
        return view('subjects.add')->with(compact('post','class','teacher'));
        
    }
    public function subjectAdd(Request $request){
        $this->validate($request,[
            'subject'=>'required',
            'class'=>'required',
            'section'=>'required',
            'teacher'=>'required',
        ]);
        $subject=new Subject;
        $subject->subject=$request->input('subject');
        $subject->code=$request->input('code');
        $subject->class=$request->input('class');
        $subject->section=$request->input('section');
        $subject->teacher=$request->input('teacher');
        $subject->save();
        $post= Subject::all();
        $class=Clas::all();
        $teacher=Teacher::all();
        return view('subjects.add')->with(compact('post','class','teacher'));
    }

    public function subjectEdit(Request $request){

        $this->validate($request,[
            'subject'=>'required',
            'class'=>'required',
            'section'=>'required',
            'teacher'=>'required'
        ]);
        
        $subject=Subject::findOrFail($request->catID);
        $subject->subject=$request->input('subject');
        $subject->code=$request->input('code');
        $subject->class=$request->input('class');
        $subject->section=$request->input('section');
        $subject->teacher=$request->input('teacher');
        $subject->save();

        return redirect('/subject');
        
    }
    public function subjectDelete(Request $request){
        $Clas=Subject::findOrFail($request->catID);
        $Clas->delete();
        return redirect('/subject');
    }


     //Announcement Controller
     public function announceView(){
        $post= Announce::all();
        return view('announcement.add')->with('post',$post);
        
    }
    public function announceAdd(Request $request){
        $this->validate($request,[
            'subject'=>'required',
            'type'=>'required',
            'for'=>'required',
            'description'=>'required'
        ]);
        $announce=new Announce;
        $announce->subject=$request->input('subject');
        $announce->type=$request->input('type');
        $announce->for=$request->input('for');
        $announce->description=$request->input('description');
        $announce->save();
        $post= Announce::all();
        return view('announcement.add')->with('post',$post);
    }

    public function announceEdit(Request $request){
        $this->validate($request,[
            'subject'=>'required',
            'type'=>'required',
            'for'=>'required',
            'description'=>'required'
        ]);
        $announce=Announce::findOrFail($request->catID);
        $announce->subject=$request->input('subject');
        $announce->type=$request->input('type');
        $announce->for=$request->input('for');
        $announce->description=$request->input('description');
        $announce->save();

        return redirect('/announcement');
        
    }
    public function announceDelete(Request $request){
        $Clas=Announce::findOrFail($request->catID);
        $Clas->delete();
        return redirect('/announcement');
    }

    //student
    public function StudentAdd(){
        $post=Carbon::now();
        $school= Subject::all();
        $clas=Clas::all(); 
        return view('student.add')->with(compact('school','post','clas'));
    }
    public function StudentMore($id){
        $post= Student::find($id);
        return view('student.details')->with('post',$post);
    }
    public function StudentEdit(Request $request){
    }
    public function StudentDelete(Request $request){
        $Student=Student::findOrFail($request->catID);
        $Student->delete();
        return redirect('/student/view');
    }
    public function StudentAd(Request $request){
        $this->validate($request,[
            'firstname'=>['required', new check],
            'lastname'=>'required',
            'fathername'=>'required',
            'studemail'=>'unique:students,studemail|nullable',
            'parentphone'=>'required',
            'parentemail'=>'required',
            'parentaddress'=>'required',
            'class'=>'required',
            'section'=>'required',  
            'year'=>'required',
            'image'=>'image|nullable|max:1999'
            
        ]);
        if($request->hasfile('image')){
            //to get the name with extension
            $imagewithExt=$request->file('image')->getClientOriginalName();
            //to just get name without extension
            $imagename=pathinfo($imagewithExt, PATHINFO_FILENAME);
            //to get extension
            $imageExt=$request->file('image')->getClientOriginalExtension();
            //give it a unique name
            $fileNameToStore=$imagename.'_'.time().'_'.$imageExt;
            //to upload
            $path=$request->file('image')->storeAs('public/images',$fileNameToStore);
        }
        else{
            $fileNameToStore="default.jpg";
        }
            
        $student= new Student;
        $student->firstname=$request->input('firstname');
        $student->lastname=$request->input('lastname');
        $student->middlename=$request->input('middlename');
        $student->studemail=$request->input('studemail');
        $student->gender=$request->input('gender');
        $student->studdate=$request->input('studdate');
        $student->studphone=$request->input('studphone');
        $student->religion=$request->input('religion');
        $student->fathername=$request->input('fathername');
        $student->occupation=$request->input('occupation');
        $student->parentphone=$request->input('parentphone');
        $student->parentphone2=$request->input('parentphone2');
        $student->parentemail=$request->input('parentemail');
        $student->parentaddress=$request->input('parentaddress');
        $student->zip=$request->input('zip');
        $student->class=$request->input('class');
        $student->section=$request->input('section');
        $student->year=$request->input('year');
        $student->club=$request->input('club');
        $student->image=$fileNameToStore;
        $student->save();
        $student->registration=$student->register();
        $student->save();
        return redirect('/student/add')->with('success', 'Registered successfully');
    }
    public function studentView(){
        $post=Student::all();
        $class=Clas::all();
        return view('student.view')->with(compact('school','post','class'));
    }

    public function StudentSpecView(Request $request){
        $class=$request->input('class');
        $section= $request->input('section');
        if(($class=="") AND ($section=="")){
            $post=Student::all();
        }
        elseif($section==""){
            $post= Student::where('class',$class)->get(); 
        }
        elseif($class==""){
            $post= Student::where('section',$section)->get();
        }
        else{
            $post= Student::where('class',$class)->where('section',$section)->get();
        }

        return view('student.view')->with('post',$post);
    }


    //teacher
    public function teacherAdd(){
        return view('teachers.add');
    }
    public function teacherAd(Request $request){
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required',
            'degree'=>'required',
            'university'=>'required',
            'course'=>'required',
            'grade'=>'required'
            
        ]);

        $teacher= new Teacher;
        $teacher->firstname=$request->input('firstname');
        $teacher->lastname=$request->input('lastname');
        $teacher->middlename=$request->input('middlename');
        $teacher->marital=$request->input('marital');
        $teacher->gender=$request->input('gender');
        $teacher->date=$request->input('date');
        $teacher->religion=$request->input('religion');
        $teacher->address=$request->input('address');
        $teacher->phone2=$request->input('phone2');
        $teacher->phone=$request->input('phone');
        $teacher->email=$request->input('email');
        $teacher->state=$request->input('state');
        $teacher->zip=$request->input('zip');
        $teacher->degree=$request->input('degree');
        $teacher->university=$request->input('university');
        $teacher->course=$request->input('course');
        $teacher->grade=$request->input('grade');
        $teacher->save();
        return('successful');
    }
    public function teacherView(){
        $post=Teacher::all();
        return view('teachers.view')->with('post',$post);
    }

    //message
    public function messageCreate(){
        $post=Message::all();
        $nowDate=Carbon::now();
        return view('messages.send')->with('nowDate',$nowDate)
                                    ->with('post',$post);
    }

    public function messageSen(Request $request){
        //$message=Message::all();
        $this->validate($request,[
            'to'=>'required',
            'from'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        $message=new Message;
        $message->to=$request->input('to');
        $message->from=$request->input('to');
        $message->subject=$request->input('subject');
        $message->message=$request->input('message');
        $message->save();
        $post=Message::all();
        $nowDate=Carbon::now();
        return view('messages.send')->with('nowDate',$nowDate)
                                    ->with('post',$post);
    }




















}
