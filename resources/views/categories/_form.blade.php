<div class="form-group {{ $errors->first('name') ? 'is-invalid': "" }}">
	{{ Form::label('name', 'Name') }}
	{{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Type Name..']) }}
	<div class="invalid-feedback">
		{{ $errors->first('name') }}
	</div>
</div>

<div class="form-group {{$errors->first('parent') ? 'is-invalid': ""}} ">
	{{ Form::label('parent', 'Sub Categories') }}
	{{ Form::select('parent', $parent, null, ['class'=>'form-control', 'placeholder'=>'Choose Sub Categories..']) }}
	<div class="invalid-feedback">
		{{ $errors->first('name') }}
	</div>
</div>

{{ Form::submit(isset($model) ? "Update" : "Save", ['class'=>'btn btn-outline-primary btn-block']) }}