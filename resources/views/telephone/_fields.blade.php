@if(count($errors) > 0)
<div class="alert alert-danger" role="alert">
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</div>
@endif

<div class="form-group">
<label for="telephone"> Telephone: </label>
<input type="text" name ="telephone" id="telephone" value="{{ isset($telephone->title) ? $telephone->title : old('title') }}" class="form-control">
</div>

<div class="form-group">
<label for="description"> Description: </label>
<input type="text" name ="description" id="description" value="{{ isset($telephone->status) ? $telephone->status : old('status') }}" class="form-control">
</div>

<input type="submit" value="{{ $modo }} telephone" class="btn btn-success">
<a href="{{ url('telephone') }}" class="btn btn-primary"> Volver </a>