<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('slug', 'Friendly URL') }}
    {{ Form::text('slug', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>
<hr>
<h3>Special permission</h3>
<div class="form-group">
    <label>{{ Form::radio('special', 'all-access') }} All-access</label>
    <label>{{ Form::radio('special', 'no-access') }} No-access</label>
</div>
<hr>

<h3>List of Permissions</h3>
<div class="form-group">
    <ul class="list-instyled">
        @foreach($permissions as $permission)
        <li>
            <label>
                {{ Form::checkbox('permissions[]', $permission->id, null) }}
                {{ $permission->name }}
                <em>({{ $permission->description ?: 'Without description' }})</em>
            </label>
        </li>

        @endforeach
    </ul>
</div>

<div class="form-group">
    {{ Form::submit('Saved', ['class' => 'btn btn-primary button-create-invoice']) }}
    <a href="{{ route('roles.index') }}" class="btn btn-danger button-create-invoice">Cancel</a>
</div>

