<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Bug;
use Illuminate\Support\Facades\Auth;
use Session;
Use DB;

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
    	
        // $developers=User::all()->where('type','developer');
        
        $projects=Project::all();
        return view('bug.create',compact('projects'));
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
            'project_id' => $request->input('project'),
            'developer_id' => $request->input('developer'),
            
            'type'=>$request->input('type'),
            'status'=>$request->input('status'),
            'deadline'=>$request->input('deadline'),
            'path'=>$imageName,
            ]);
           

        
        return redirect()->route('show_project');

    }



    public function index(){
        $bugs=Bug::latest()->paginate(5);
        
        return view('bug.index',compact('bugs'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function resolved(){
        $bugs=Bug::all()->where('status','resolved')
                        ->where('developer_id',Auth::id());
        return view('bug.index',compact('bugs'));
    }


    public function reported(){
         $bugs=Bug::all()
         ->where('developer_id',Auth::id())
         ->where('status','started');
           
      //       
      //     ->where(function($q) {
      //     $q->where('status','resolved')
      //       ->orWhere('status','started');
      //           })
      // ->get();
        return view('bug.index',compact('bugs'));
    }

    public function developerProjects( Request $request){

            // $developers =User::all() 
            // ->pluck("name","id");
        // $developers=User::where('id',Auth::id());
        // $developers=$developers->developerProjects;

        $developers = DB::table("users")
            ->join('assign__projects','users.id', '=', 'assign__projects.developer_id')
            ->where("assign__projects.project_id",$request->projectID)
            ->pluck("users.name","users.id");

            return response()->json($developers);
        

     
       
    // if($request->ajax()){
    //         $projects=User::find($developer)->Projects;
    //         $data = view('ajax-select',compact('projects'))->render();
    //         return response()->json(['options'=>$data]);
    //     }
    }
    public function show($id){
            $bug = Bug::find($id);
                if(Auth::id()!=$bug->qa_id){
                    return view('home');
                } 
                else{

                    
                    
              
                    return view('bug.show',compact('bug'));

                        
                    }

    }
    public function edit($id){
            $bug = Bug::find($id);
                if(Auth::id()!=$bug->qa_id){
                    return view('home');
                } 
                else{

                    $projects=Project::all();
        
                          
              
                    return view('bug.edit',compact('bug','projects'));

                        
                    }
    }


    public function update(Request $request,$id){
                    $bug = Bug::find($id);

                        if(Auth::id()!=$bug->qa_id){    
                            return view('home');
                            } 
                        else{
                             $imageName="" ;
                                if($request->has('image')){
                                     $imageName = time().'.'.request()->image->getClientOriginalExtension();
                                request()->image->move(public_path('images'), $imageName);


                                 }   
                                $bug->project_id = $request->input('project');
                                $bug->developer_id = $request->input('developer');
                                
                                $bug->type=$request->input('type');
                                $bug->status=$request->input('status');
                                $bug->deadline=$request->input('deadline');
                                $bug->path=$imageName;
            

                           $bug->title= $request->input('title');
                            $bug->description=$request->input('description');
                            $bug->save();

                            }
       
        
            
        
                        
                    
              
                                return redirect()->route('show_bug')
                                    ->with('success','bug Updated successfully');

                    
          }


    public function destroy($id){
        $bug = Bug::find($id);
            if(Auth::id()!=$bug->qa_id){
                return view('home');
            } 
            else{
                         } 
               

                
                $bug->delete();
          
                return redirect()->route('show_bug')
                                ->with('success','Bug deleted successfully');

                    
                }

    
}
