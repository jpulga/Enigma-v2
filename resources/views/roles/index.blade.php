@extends('layouts.app')

@section('content')
<!-- <div class="container mt-1 mb-3">
    <div class="px-4 clearfix">
        <div class="float-left ml-5">
            <h4>Roles</h4>
        </div>

        <div class="action-buttons mt-2 mt-sm-0 ml-sm-1">
        @can('roles.create')
                <a href="{{ route('roles.create') }}" class="btn btn-primary d-none d-sm-block">Crear</a>
                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-lg btn-block d-block d-sm-none mt-5">Crear</a>
                @endcan
            </div>
    </div>
</div> -->

<div class="container mt-1 mb-3">
    <div class="px-4 clearfix">
        <div class="float-left ml-3">
            <h3>Roles</h3>
        </div>
        
        <div class="float-right">
            {!! Form::open(['route' => 'roles.index', 'method' => 'GET', 'class' => 'form-inline my-2 my-md-0', 'role' => 'search']) !!}
                <div class="input-group">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Search']) !!}
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>

                @can('roles.create')
                    <div class="action-buttons mt-2 mt-sm-0 ml-sm-1">
                        <a href="{{ route('roles.create') }}" class="btn btn-primary d-none d-sm-block">Create</a>
                        <a href="{{ route('roles.create') }}" class="btn btn-primary btn-lg btn-block d-block d-sm-none">Create</a>
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
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>
                        @can('roles.show')
                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-outline-success"><i class="far fa-file-alt"></i></a>
                        @endcan

                        @can('roles.edit')
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-outline-warning"><i class="far fa-edit"></i></a>
                        @endcan

                        @can('roles.destroy')
                            <form class="form d-md-inline-block" method="post" action="{{route('roles.destroy', $role)}}"
                                onsubmit="return confirm('¿You are sure to eliminate the role {{$role->name}}?')">
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
        {{ $roles->render() }}
    </div>    
</div>
@endsection