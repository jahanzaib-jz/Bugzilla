@extends('home')

@section('new project')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Assign Project to developer</h1></div>
                <br>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" 
                    action="{{ route('assign_project') }}">
                        {{ csrf_field() }}

                   <div class="form- row{{ $errors->has('project') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label ">Project</label>
                    
                            <div class="col-md-6 ">
                                <select id="project" type="text" class="form-control" name="project" value="Developer" required >
                                   
                                     @foreach($projects as $project)
                                        <option value="{{$project->id}}">{{$project->title}}</option>
                                    @endforeach
                                       
                                  
                                </select>

                                @if ($errors->has('project'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form- row{{ $errors->has('developer') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label ">Developer</label>

                            <div class="col-md-6 ">
                                <select id="developer" type="text" class="form-control" name="developer" value="Developer" required >
                                    @foreach($developers as $developer)
                                        <option value="{{$developer->id}}">{{$developer->name}}</option>
                                    @endforeach
                                        
                                  
                                </select>

                                @if ($errors->has('developer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <br>
                        <div class="form-group">
                            <div class="col-md-3 offset-md-8">
                                <button type="submit" class="btn btn-primary">
                                    Assign
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
