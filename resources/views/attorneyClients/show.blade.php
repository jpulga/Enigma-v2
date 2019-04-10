@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header"><h4 class="pt-2">Client <small><strong>{{ $attorneyClient->first_name }} {{ $attorneyClient->middle_name }} {{ $attorneyClient->last_name }}</strong></small></h4></div>
        <div class="card-body">
            <div class="media text-muted pt-2">
                <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" role="img" >
                    <rect width="100%" height="100%" fill="#cf8d2e"/>
                </svg>
                <p class="media-body">
                    <strong class="d-block">First Name: </strong>{{ $attorneyClient->first_name }}
                    <strong class="d-block pt-2">Middle Name: </strong>{{ $attorneyClient->middle_name }}
                    <strong class="d-block pt-2">Last Name: </strong>{{ $attorneyClient->last_name }}
                    <strong class="d-block pt-2">Dob: </strong>{{ $attorneyClient->dob }}
                </p>
            </div>
        </div>

        <div class="container mt-2">
            <div class="footer mb-3">
                <a href="{{ route('attorneyClients.index') }}" class="btn btn-warning button-create-invoice">Back</a>
            </div> 
        </div>
    </div>
</div>


    
@endsection