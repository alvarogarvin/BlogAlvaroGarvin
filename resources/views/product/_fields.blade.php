@if(count($errors) > 0)
<div class="alert alert-danger" role="alert">
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</div>
@endif

<div class="form-group">
<label for="name"> Name: </label>
<input type="text" name ="name" id="name" value="{{ isset($product->name) ? $product->name : old('name') }}" class="form-control">
</div>

<div class="form-group">
<label for="description"> Description: </label>
<input type="text" name ="description" id="description" value="{{ isset($product->description) ? $product->description : old('description') }}" class="form-control">
</div>

<div class="form-group">
<label for="quantity"> Quantity: </label>
<input type="text" name ="quantity" id="quantity" value="{{ isset($product->quantity) ? $product->quantity : old('quantity') }}" class="form-control">
</div>

<div class="form-group">
<label for="status"> Status: </label>
<input type="text" name ="status" id="status" value="{{ isset($product->status) ? $product->status : old('status') }}" class="form-control">
</div>

<input type="submit" value="{{ $modo }} product" class="btn btn-success">
<a href="{{ url('product') }}" class="btn btn-primary"> Volver </a>