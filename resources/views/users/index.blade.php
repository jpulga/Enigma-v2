@extends('layouts.app')

@section('content')
<div class="container mt-1 mb-3">
    <div class="px-4 clearfix">
        <div class="float-left ml-3">
            <h3>Users</h3>
        </div>
        
        <div class="float-right menu-users-clients">
            {!! Form::open(['route' => 'users.index', 'method' => 'GET', 'class' => 'form-inline my-2 my-md-0', 'role' => 'search']) !!}
                <div class="input-group">
                    {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Search']) !!}
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
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
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->middle_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->dob }}</td>
                    <td>
                        @can('users.show')
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-outline-success"><i class="far fa-file-alt"></i></a>
                        @endcan

                        @can('users.edit')
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-warning"><i class="far fa-edit"></i></a>
                        @endcan

                        @can('users.destroy')
                            <form class="form d-md-inline-block" method="post" action="{{route('users.destroy', $user)}}"
                                onsubmit="return confirm('¿You are sure to remove the user {{$user->first_name}}?')">
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
        {{ $users->render() }}
    </div>    
</div>
@endsection