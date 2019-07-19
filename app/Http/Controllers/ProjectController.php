<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\User;
use App\Assign_Project;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    //
	 protected function validator(array $data)
    {
        return Validator::make($data, [
            
             'title' => ['required','max:255','unique:projects'],
            
        ]);
    }

    public function create(){
	return view('project.new');
    }

    protected function store(Request $request){

        Project::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'manager_id' => Auth::id()
            
        ]);
        return redirect()->route('show_project');
    }

     public function show(){
    	$projects=Project::all();

    	return view('project.showprojects',compact('projects'));
    }



    public function newAssignment(){
    	$developers=User::all()->where('type','developer');
    	
    	$projects=Project::all();
    	return view('project.assignment',compact('developers','projects'));

    }


   


    public function assignProject(Request $request){

    	Assign_Project::create([
            'developer_id' => $request->input('developer'),
            'project_id' => $request->input('project'),
            'manager_id' => Auth::id()
            
        ]);
        return redirect()->route('show_project');

    }
     public function assignedProject(){
     	$assigned=Assign_Project::where('developer_id',Auth::id())->projects;
     	// dd($assigned);
     	// $projects=$assigned->projects->title;
        return redirect()->route('show_project',$assigned);

    }
}
