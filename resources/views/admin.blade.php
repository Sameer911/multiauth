@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <h1>Admin Home Page</h1>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{url('dashboard')}}" class="btn btn-primary">Admin Dashboard</a>
                </div>                
            </div>
        </div>
    </div>
</div>

@endsection


{{-- @extends('layouts.master')

@section('content')


    
    <div class="card">
        <div class="card-body">
            <h1>Admin Dashboard</h1>
            
        </div>
    </div>

    <div class="container mt-5">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                               Cash In Hand</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{-- {{$Cashinhand}} --}}
                            {{-- </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection  --}}
