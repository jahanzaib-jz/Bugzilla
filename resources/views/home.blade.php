@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                <dir class="">
                    
                @can('isManager')
                
               
                                <a href="{{ route('new_project') }}" class="btn btn-primary">
                                    Create Project
                                </a>

                
                                 <a href="{{ route('reported_bugs') }}" class="btn btn-primary">
                                    Assign Project
                                </a>
                 @endcan
                  
                    @can('isQA') 

                
                                 <a href="{{ route('reported_bugs') }}" class="btn btn-primary">
                                    Add bug
                                </a>
                    @endcan
                 @can('isDeveloper') 
                 
                                 <a href="{{ route('reported_bugs') }}" class="btn btn-primary">
                                    Ressolved  bugs
                                </a>
                
                                 <a href="{{ route('reported_bugs') }}" class="btn btn-primary">
                                    Reported bugs
                                </a>
                 @endcan
                 @canany(['isQA', 'isDeveloper'])
                     
                                 <a href="{{ route('reported_bugs') }}" class="btn btn-primary">
                                    Show bugs
                                </a>
                 @endcanany

                
                                 <a href="{{ route('show_project') }}" class="btn btn-primary">
                                    Show  Projects
                                </a>
                 
                
                </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  @yield('new project')
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
