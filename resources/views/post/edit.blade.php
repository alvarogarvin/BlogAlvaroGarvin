@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/post/' . $post->id) }}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('post._fields', ['modo' => 'Editar'])
    </form>
</div>
@endsection