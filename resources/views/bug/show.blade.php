@extends('home')

@section('new project')
<div class="container">
    <div class="row ">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Bugs list</h1> </div>

                <div class="panel-body">
                  
                   
                    
                   
                    

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
                                  
                                  <td>{{$bug->project->title}}</td>
                                  <td >{{$bug->developer->name}}</td>
                                  <td><img height="100" src="/images/{{$bug->path}}"></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                    </table>    
 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
