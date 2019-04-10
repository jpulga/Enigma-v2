@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header"><h4 class="pt-2">Attorney <small><strong>{{ $attorney->first_name }} {{ $attorney->middle_name }} {{ $attorney->last_name }}</strong></small></h4></div>
        <div class="card-body">
            <div class="media text-muted pt-2">
                <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" role="img" >
                    <rect width="100%" height="100%" fill="#be0027"/>
                </svg>
                <p class="media-body">
                    <strong class="d-block">First Name: </strong>{{ $attorney->first_name }}
                    <strong class="d-block pt-2">Middle Name: </strong>{{ $attorney->middle_name }}
                    <strong class="d-block pt-2">Last Name: </strong>{{ $attorney->last_name }}
                    <strong class="d-block pt-2">Dob: </strong>{{ $attorney->dob }}
                </p>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header"><h4 class="pt-2">Clients of <small><strong>{{ $attorney->first_name }} {{ $attorney->middle_name }} {{ $attorney->last_name }}</strong></small></h4></div>
        <div class="card-body">
            <div class="media text-muted pt-2">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="cortar">First Name</th>
                                <th class="cortar">Middle Name</th>
                                <th class="cortar">Last Name</th>
                                <th class="cortar">Dob</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attorney->products as $product)
                            <tr>
                                <td class="table-name">{{$product->first_name}}</td>
                                <td class="table-price">{{$product->middle_name}}</td>
                                <td class="table-qty">{{$product->last_name}}</td>
                                <td class="table-total">{{$product->dob}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-2">
                <div class="footer mb-2">
                    <a href="{{ route('attorneys.edit', $attorney->id) }}" class="btn btn-success button-create-invoice">Edit</a>
                    <a href="{{ route('attorneys.index') }}" class="btn btn-warning button-create-invoice">Back</a>

                    <form class="form d-md-inline-block" method="post" action="{{route('attorneys.destroy', $attorney)}}"
                                onsubmit="return confirm('¿Estas seguro de borrar la factura {{$attorney->first_name}}?')">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button title="Borrar Factura" type="submit" class="btn btn-danger button-create-invoice">Delete</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection