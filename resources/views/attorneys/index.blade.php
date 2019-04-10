@extends('layouts.app')

@section('content')
<div class="container mt-1 mb-3">
    <div class="px-4 clearfix">
        <div class="float-left ml-3">
            <h3>Attorneys</h3>
        </div>
        
        <div class="float-right">
            {!! Form::open(['route' => 'attorneys.index', 'method' => 'GET', 'class' => 'form-inline my-2 my-md-0', 'role' => 'search']) !!}
                <div class="input-group">
                    {!! Form::text('first name', null, ['class' => 'form-control', 'placeholder' => 'Search']) !!}
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                
                @can('attorneys.create')
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
                    <th>N° Attorney</th>              
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Dob</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attorneys as $attorney)
                <tr>
                    <td>{{ $attorney->attorney_number }}</td>
                    <td>{{ $attorney->first_name }}</td>
                    <td>{{ $attorney->middle_name }}</td>
                    <td>{{ $attorney->last_name }}</td>
                    <td>{{ $attorney->dob }}</td>
                    <td>
                        @can('attorneys.show')
                            <a href="{{ route('attorneys.show', $attorney->id) }}" class="btn btn-sm btn-outline-success"><i class="far fa-file-alt"></i></a>
                        @endcan

                        @can('attorneys.edit')
                            <a href="{{ route('attorneys.edit', $attorney->id) }}" class="btn btn-sm btn-outline-warning"><i class="far fa-edit"></i></a>
                        @endcan

                        @can('attorneys.destroy')
                            <form class="form d-md-inline-block" method="post" action="{{route('attorneys.destroy', $attorney)}}"
                                onsubmit="return confirm('¿You are sure to eliminate the attorney {{$attorney->first_name}}?')">
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
        {{ $attorneys->render() }}
    </div>    
</div>
@endsection