<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

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


    	
        // $data            = $request->only('title', 'description');
        
        // $data['manager_id'] =Auth::id();
        // $post            = Project::create($data);

        Project::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'manager_id' => Auth::id()
            
        ]);
        return redirect()->route('show_project');
    }


    public function show(){

    }
    public function assignProject(){

    }
}
