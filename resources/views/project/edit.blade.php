@extends('home')

@section('new project')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading "><h1 align="center">Edit Project</h1></div>
 <br>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('project.update',$project->id)}}">
                        @csrf
                         @method('PUT')

                        <div class="form-row{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{$project->title}}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 <br>
                        <div class="form-row{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{$project->description}} </textarea>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<br>
                        <div class="form-group">
                            <div class="col-md-3 offset-md-8">
                                <button type="submit" class="btn btn-primary">
                                    Update
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
