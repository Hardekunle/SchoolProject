<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\addAnnoucement;

class schoolWebsiteController extends Controller
{
    public function viewAnnouncement(){
        $post= addAnnoucement::all();
        return view('functions.addAnnouncement')->with('post',$post);
        
    }

    public function addAnnouncement(Request $request){
        $this->validate($request,[
            'forSelect'=> 'required',
            'typeSelect'=>'required',
            'subject'=>'required'
        ]);

        $addAnnouncement=new addAnnoucement;
        $addAnnouncement->for= $request->input('forSelect');
        $addAnnouncement->type= $request->input('typeSelect');
        $addAnnouncement->subject= $request->input('subject');
        $addAnnouncement->description= $request->input('description');
        $addAnnouncement->save();
        $post= addAnnoucement::all();
        return view('functions.addAnnouncement',compact('post'));

    }
    
    public function confirmDelete(Request $request,$id){
    
    $value= $request->input('submit1');

    if($value == 'yes'){
        $value= addAnnoucement::find($id);
        $value->delete();
        $post= addAnnoucement::all();
        return redirect('/announcement')->with('post',$post);
        }
    }

    public function EditAnnouncement(Request $request, $id){

        $this->validate($request,[
            'forSelect'=> 'required',
            'typeSelect'=>'required',
            'subject'=>'required'
        ]);
        $addAnnouncement= addAnnoucement::find($id);
        $addAnnouncement->for= $request->input('forSelect');
        $addAnnouncement->type= $request->input('typeSelect');
        $addAnnouncement->subject= $request->input('subject');
        $addAnnouncement->description= $request->input('description');
        $addAnnouncement->save();
        $post= addAnnoucement::all();
        return redirect('/announcement')->with('post',$post);

    }
    
}
