@extends('home')

@section('new project')
<div class="container">
        

    {{-- <script src="http://www.codermen.com/js/jquery.js"></script> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

   

    <script src="{{asset('/js/testing.js')}}"></script>
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-heading "><h1 align="center">New Bug</h1></div>
     {{ csrf_field() }}
    <br>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('store_bug') }}" enctype="multipart/form-data">
                      
                        
                         <div class="form-row{{ $errors->has('project') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label ">Project</label>
                    
                            <div class="col-md-6 ">
                                 <select id="project" type="text" class="form-control" name="project" value="Developer" required >   
                                     <option value="">Select Project</option>
                                        
                              @foreach($projects as $project)
                                        <option value="{{$project->id}}">{{$project->title}}</option>
                                    @endforeach
                                       
                                  
                                </select>

                                @if ($errors->has('project'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('project') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                         
                        <div class="form- row{{ $errors->has('developer') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label ">Developer</label>

                            <div class="col-md-6 ">
                                {{-- {!! Form::select('developer',[''=>'--- Select Country ---']+$developers,null,['class'=>'form-control']) !!}
     --}}
                                <select id="developer" type="text" class="form-control" name="developer" required >
                                   
                                        
                                  
                                </select>

                                @if ($errors->has('developer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>

                           <div class="form-row{{ $errors->has('deadline') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label ">Deadline</label>
                    
                            <div class="col-md-6 ">
                                
                               <input id="deadline" type="date" class="form-control" name="deadline" value="{{ old('title') }}" required autofocus>
                                @if ($errors->has('deadline'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deadline') }}</strong>
                                    </span>
                                @endif
                            </div>
                         
                        </div>

                       <br>
                        <div class="form-row{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <label for="title" class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                                <input id="image" class="form-control" type="file" class="form-control" name="image" value="{{ old('image') }}" >

                                
                            </div>
                        </div>
 <br>
                        <div class="form-row{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6"> 
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" >{{ old('description') }}</textarea>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<br>
                        <div class="form- row{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label ">Type</label>

                            <div class="col-md-6 ">
                                    <select id="type" type="text" class="form-control"   name="type"  required >
                                        <option value=""> Select Bug type</option>
                                        <option value="Feature" >Feature</option>
                                        <option value="Bug">Bug</option>
                                        
                                  
                                </select>

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        
                         <div class="form- row{{ $errors->has('developer') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label ">Status</label>
                           
                            <div class="col-md-6 ">
                                <select id="status" type="text" class="form-control" name="status" required>
                                       
                                </select>

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>   
                        <div class="form-group">
                            <div class="col-md-3 offset-md-8">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection