@extends('home')

@section('new project')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Bugs list</h1> </div>

                <div class="panel-body">
                    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
                   
                    
                   
                    

                  </div>
                     <table class="table table-hover ">
                             <thead class="table-primary">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Descrption</th>
                                  <th scope="col">Deadline</th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">QA</th>
                                  <th scope="col">Project</th>
                                  <th scope="col">Developer</th>
                                  <th scope="col">Image</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                             <tbody>
                              @foreach($bugs as $bug)

                                <tr style="max-width: 100px;
                                          overflow:hidden;
                                          /*text-overflow: ellipsis;*/
                                          white-space: nowrap;">
                                  <th scope="row">{{$bug->id}}</th>
                                  <td>{{$bug->title}}</td>
                                  <td >{{$bug->description}}</td>
                                  {{-- <td>{{$project->manager->name}}</td> --}}
                                  <th>{{$bug->deadline}}</th>
                                  <td>{{$bug->type}}</td>
                                  <td >{{$bug->status}}</td>
                                  <td>{{$bug->qa->name}}</td>
                                  
                                  <td>hamza{{$bug->project->title}}</td>
                                  <td >{{$bug->developer->name}}</td>
                                  <td><img height="100" src="/images/{{$bug->path}}"></td>
                                  <td>
                                    
                                   
   
                                                    <a class="btn btn-info" href="{{ route('bug.show',$bug->id) }}">Show</a>
                                    @if(Auth::user()->id==$bug->qa_id)
                                                    <a class="btn btn-primary" href="{{ route('bug.edit',$bug->id) }}">Edit</a>
                                   <form action="{{ route('bug.destory',$bug->id) }}" method="POST">
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
 {!! $bugs->links() !!}
@endsection
