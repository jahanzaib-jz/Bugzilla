<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Bug;
use Illuminate\Support\Facades\Auth;

class BugController extends Controller
{
    //
    protected function validator(array $data)
    {
        return Validator::make($data, [
            
             'title' => ['required','max:255','unique:bugs'],
             'image' => 'image|mimes:png,jpg,gif|max:2048|size:5mb'
            
        ]);
    }

    public function create(){
    	
        $developers=User::all()->where('type','developer');
        
        $projects=Project::all();
        return view('bug.create',compact('developers','projects'));
    }
    public function store(Request $request){
        

        // If($file=$request->file('path')){
        //     $image=$file->getClientOriginalName();
        //     $file->move('images',$image);
        //     $data['path']=$image;
        // }
        $imageName="" ;
        if($request->has('image')){
             $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        }
       
        Bug::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'qa_id' => Auth::id(),
            'developer_id' => $request->input('developer'),
            'project_id' => $request->input('project'),
            'type'=>$request->input('type'),
            'status'=>$request->input('status'),
            'deadline'=>$request->input('deadline'),
            'path'=>$imageName,
            ]);
           

        
        return redirect()->route('show_project');

    }
    public function show(){
        $bugs=Bug::all();
        return view('bug.show',compact('bugs'));
    }
    public function resolved(){
        $bugs=Bug::all()->where('status','resolved');
        return view('bug.show',compact('bugs'));
    }
    public function reported(){
         $bugs=Bug::all()->where('status','started');
        return view('bug.show',compact('bugs'));
    }
}
