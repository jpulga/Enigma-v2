@extends('layouts.app')

@section('content')
<div class="container mt-1 mb-3">
    <div class="px-4 clearfix">
        <div class="float-left ml-3">
            <h3>Clients</h3>
        </div>
        
        <div class="float-right menu-users-clients">
            {!! Form::open(['route' => 'attorneyClients.index', 'method' => 'GET', 'class' => 'form-inline my-2 my-md-0', 'role' => 'search']) !!}
                <div class="input-group">
                    {!! Form::text('first name', null, ['class' => 'form-control', 'placeholder' => 'Search']) !!}
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>

                @can('attorneyClients.create')
                    <div class="action-buttons mt-2 mt-sm-0 ml-sm-1">
                        <a href="{{ route('attorneys.create') }}" class="btn btn-primary d-none d-sm-block">Create</a>
                        <a href="{{ route('attorneys.create') }}" class="btn btn-primary btn-lg btn-block d-block d-sm-none">Create</a>
                    </div>
                @endcan
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="container">
    <div class="table-responsive px-4">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>              
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Dob</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attorneyClients as $attorneyClient)
                <tr>
                    <td>{{ $attorneyClient->id }}</td>
                    <td>{{ $attorneyClient->first_name }}</td>
                    <td>{{ $attorneyClient->middle_name }}</td>
                    <td>{{ $attorneyClient->last_name }}</td>
                    <td>{{ $attorneyClient->dob }}</td>
                    <td>
                        @can('attorneyClients.show')
                            <a href="{{ route('attorneyClients.show', $attorneyClient->id) }}" class="btn btn-sm btn-outline-success"><i class="far fa-file-alt"></i></a>
                        @endcan

                        <!-- @can('attorneyClients.edit')
                            <a href="{{ route('attorneyClients.edit', $attorneyClient->id) }}" class="btn btn-sm btn-outline-warning"><i class="far fa-edit"></i></a>
                        @endcan -->

                        @can('attorneyClients.destroy')
                            <form class="form d-md-inline-block" method="post" action="{{route('attorneyClients.destroy', $attorneyClient)}}"
                                onsubmit="return confirm('¿You are sure to eliminate the attorney {{$attorneyClient->first_name}}?')">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button title="" type="submit" class="btn btn-sm btn-outline-danger button-create-invoice"><i class="far fa-trash-alt"></i></button>
                            </form>
                        @endcan
                    </td>
                  
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $attorneyClients->render() }}
    </div>    
</div>
@endsection