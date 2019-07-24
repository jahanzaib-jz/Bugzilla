@extends('home')

@section('new project')
<div class="container">
    <div class="row ">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Projects list</h1> </div>

                <div class="panel-body ">
                	  @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
                    <table class="table table-hover ">
                             <thead class="table-primary">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Descrption</th>
                                  <th scope="col">Manager</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                             <tbody>
                                @foreach($projects as $project)
                                <tr style="max-width: 100px;
                                          overflow:hidden;
                                          /*text-overflow: ellipsis;*/
                                          white-space: nowrap;">
                                  <th scope="row">{{$project->id}}</th>
                                  <td>{{$project->title}}</td>
                                  <td >{{$project->description}}</td>
                                  
                                  <td>{{$project->manager->name}}</td>
                                  <td>
                                  	
                                   
   
																                    <a class="btn btn-info" href="{{ route('project.show',$project->id) }}">Show</a>
																    @if(Auth::user()->id==$project->manager_id)
																                    <a class="btn btn-primary" href="{{ route('project.edit',$project->id) }}">Edit</a>
																   <form action="{{ route('project.destory',$project->id) }}" method="POST">
																                    @csrf
																                    @method('DELETE')
																      
																                    <button type="submit" class="btn btn-danger">Delete</button>
																                </form>
																                @endif
                                  </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                    </table>    
                </div>
            </div>

        </div>

    </div>
    
</div>
 {!! $projects->links() !!}
@endsection
