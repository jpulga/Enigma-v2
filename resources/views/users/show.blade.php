@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header"><h4 class="pt-2">User <small><strong> {{ $user->username }}</strong></small></h4></div>
        <div class="card-body">
            <div class="media text-muted pt-2">
                <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" role="img" >
                    <rect width="100%" height="100%" fill="#2c9f45"/>
                </svg>
                <p class="media-body">
                    <strong class="d-block">First Name:</strong>{{ $user->first_name }}
                    <strong class="d-block pt-2">Middle Name: </strong>{{ $user->middle_name }}
                    <strong class="d-block pt-2">Last Name: </strong>{{ $user->last_name }}
                    <strong class="d-block pt-2">Dob: </strong>{{ $user->dob }}
                </p>
            </div>
        </div>

        <div class="footer mb-3 ml-3 mr-3">
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success button-create-invoice">Edit</a>
            <a href="{{ route('users.index') }}" class="btn btn-warning button-create-invoice">Back</a>
            
            <form class="form d-md-inline-block" method="post" action="{{route('users.destroy', $user)}}"
                onsubmit="return confirm('¿Estas seguro de borrar la factura {{$user->first_name}}?')">
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button title="Borrar Factura" type="submit" class="btn btn-danger button-create-invoice">Delete</button>
            </form>
        </div>    
    </div>
</div>
@endsection


