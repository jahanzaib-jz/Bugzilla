@extends('home')

@section('new project')
<div class="container">
    <div class="row ">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

               
             <div class="panel-heading"><h1>Show Project</h1> </div>
                <div class="panel-body ">
                  <div class="form-group">
                <strong>Title:</strong>
                {{ $project->title }}
                </div>
             <div class="form-group">
                <strong>Description:</strong>
                {{ $project->description }}
            </div>
        </div>
                	 
            </div>

        </div>

    </div>
    
</div>
</div>

@endsection
