@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/telephone/' . $telephone->id) }}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('telephone._fields', ['modo' => 'Editar'])
    </form>
</div>
@endsection