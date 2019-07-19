@extends('home')

@section('new project')
<div class="container">
    <div class="row ">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Projects list</h1> </div>

                <div class="panel-body ">
                    <table class="table table-hover ">
                             <thead class="table-primary">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Descrption</th>
                                  <th scope="col">Manager</th>
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
