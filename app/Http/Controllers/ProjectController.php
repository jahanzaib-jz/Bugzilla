<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\User;
use App\Assign_Project;
use App\Http\Controllers\Controller;
use DB;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Exception;

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
        try {
        Assign_Project::create([
            'developer_id' => $request->input('developer'),
            'project_id' => $request->input('project'),
            'manager_id' => Auth::id()
            
        ]);
    } catch (Exception $exception) {
       $project= Project::find($request->input('project'));
       $developer= User::find($request->input('developer'));
        return back()->withError($project->title.' is already assigned to '.$developer->name)->withInput();
    }
    
        // Validate the value...
	
    
        

        // return redirect()->back()->with('alert', 'already!');
    
    	
        return redirect()->route('show_project');

    }

     public function assignedProject(){
     	// $assigned=Assign_Project::where('developer_id',Auth::id())->projects;
     	// $projects=DB::table('assign__projects')
     	// ->join('projects','assign__projects.project_id','=','projects.id')
     	// ->join('users','assign__projects.manager_id','=','users.id')
     	// ->where('assign__projects.developer_id',Auth::id())
     	// ->select('projects.*','users.name')
     	// ->get();
     	// foreach ($projects as $project) {
     	// 	# code...
     	// $projects['manager->title']=$projects->users->name;
     	// }
     	// $projects=DB::statement('select projects.id,projects.title,projects.description,users.name from projects inner join assign__projects on projects.id=assign__projects.project_id inner join users on assign__projects.developer_id=users.id where projects.manager_id=1');
     	// foreach ($assigned as $key) {
     	// 	# code...
     	// 	echo $key->title;
     	// 	// echo Auth::id();
     	// }
     	// if($this->authorize('isManager')){
     		// $projects=Project::all()->where('manager_id',Auth::id());
     	// }
     	// else{
     		$projects=User::find(Auth::id())->userProjects;
     	// // }
     	// $projects=User::find(Auth::id())->projects;
     	// $projects=$projects->where('manager_id',Auth::id());
     	// 
     	// 
     	// dd($assigned);
     	// $projects=$assigned->projects->title;
        // return redirect()->route('show_project',$projects);
        // return view('project.assignment',compact('projects'));
        return view('project.assignedprojects',compact('projects'));

    }
}
