<div class="form-group {{ $errors->first('name') ? 'is-invalid' : '' }} ">
	{{ Form::label('name', 'Product Name') }}
	{{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Type Product name']) }}
	<div class="invalid-feedback">
		{{ $errors->first('name') }}
	</div>
</div>
<br>
<div class="form-group {{ $errors->first('name') ? 'is-invalid' : '' }} ">
	{{ Form::label('model', 'Model Product') }}
	{{ Form::text('model', null, ['class'=>'form-control', 'placeholder'=>'Type model Product']) }}
	<div class="invalid-feedback">
		{{ $errors->first('model') }}
	</div>
</div>
<br>
<div class="form-group {{ $errors->first('category') ? 'is-invalid' : '' }}">
	{{ Form::label('category', 'Categories') }}
	{{ Form::select('category[]', $category, null, ['class'=>'form-control select2-multiple', 'style'=>"width: 100%;", 'multiple'=>'multiple', 'placeholder'=>'Choose Product']) }}
	<div class="invalid-feedback">
		{{ $errors->first('category') }}
	</div>
</div>
<br>
<div class="form-group {{ $errors->first('price') ? 'is-invalid' : ''}}">
	{{ Form::label('price', 'Price') }}
	{{ Form::text('price', null, ['class'=>'form-control', 'placeholder'=>'Type Price..']) }}
</div>
<br>
<div class="form-group {{ $errors->first('photo') ? 'is-invalid' : '' }} ">
	{{ Form::label('photo', 'Product Photo (jpeg, png, jpg)') }}
	{{ Form::file('photo', ['class'=>'form-control']) }}
	<div class="invalid-feedback">
		{{ $errors->first('photo') }}
	</div>
	<br>
	@if (isset($model) && $model->photo)
		<p>Current photo</p> <br>
		<img src="{{ url('storage/'. $model->photo) }}" alt="{{ $model->photo }}" class="img-thumbnail">
	@endif
</div>
<br>

{{ Form::submit(isset($model) ? 'Update' : 'Save', ['class'=> 'btn btn-outline-primary btn-block']) }}