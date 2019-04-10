<div class="form-group">
    {{ Form::label('first_name', 'First Name') }}
    {{ Form::text('first_name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('middle_name', 'Middle Name') }}
    {{ Form::text('middle_name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('last_name', 'Last Name') }}
    {{ Form::text('last_name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('username', 'Username') }}
    {{ Form::text('username', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('dob', 'Dob') }}
    {{ Form::date('dob', null, ['class' => 'form-control']) }}
</div>
<hr>

<h3>Lista de roles</h3>
<div class="form-group">
    <ul class="list-instyled">
        @foreach($roles as $role)
        <li>
            <label>
                {{ Form::checkbox('roles[]', $role->id, null) }}
                {{ $role->name }}
                <em>({{ $role->description ?: 'Sin description' }})</em>
            </label>
        </li>
        @endforeach
    </ul>
</div>

<div class="form-group">
    {{ Form::submit('Saved', ['class' => 'btn btn-primary']) }}
    <a href="{{ route('users.index') }}" class="btn btn-danger button-create-invoice">Cancel</a>
</div>
