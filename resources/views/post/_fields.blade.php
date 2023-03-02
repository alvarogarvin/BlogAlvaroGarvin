@if(count($errors) > 0)
<div class="alert alert-danger" role="alert">
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</div>
@endif

<div class="form-group">
<label for="title"> Title: </label>
<input type="text" name ="title" id="title" value="{{ isset($post->title) ? $post->title : old('title') }}" class="form-control">
</div>

<div class="form-group">
<label for="status"> Status: </label>
<input type="text" name ="status" id="status" value="{{ isset($post->status) ? $post->status : old('status') }}" class="form-control">
</div>

<input type="submit" value="{{ $modo }} post" class="btn btn-success">
<a href="{{ url('post') }}" class="btn btn-primary"> Volver </a>