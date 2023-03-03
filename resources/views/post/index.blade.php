<!DOCTYPE html>
<html lang="en">
<head>
<!-- <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css"> -->
<title> Listado de posts </title>
</head>
<body>

@extends('layouts.app') <!-- Aqui es donde se cargan las plantillas -->

@section('script')
<link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
@endsection 

@section('content')
<div class="container">
    <a href="{{ url('post/create') }}" class="btn btn-success"> Registrar post</a>
    @if (Session::has('mensaje'))
        <br>
        <div class="alert alert-success">
            {{ Session::get('mensaje') }}
        </div>
    @endif
    <!-- <div class="container">
        <div class="row">
            <div class="col"> -->
                <table class="table data-table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th> # </th>
                            <th> User_id </th>
                            <th> Title </th>
                            <th> Status </th>
                            <th> Fecha de creación </th>
                            <th> Ultima Actualización </th>
                            <th> Acciones </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $posts as $post)
                            <tr>
                                <td> {{ $post->id }} </td>
                                <td> {{ $post->user_id }} </td>
                                <td> {{ $post->title }} </td>
                                <td> {{ $post->status }} </td>
                                <td> {{ $post->created_at }} </td>
                                <td> {{ $post->updated_at }} </td>
                                <td> 
                                    <div class="btn-group" role="group">
                                        <a href="{{ url('/post/' . $post->id . '/edit') }}" class="btn btn-warning"> Editar </a><a href="{{ url('post/' . $post->id) }}" class="btn btn-primary"> Ver </a>
                                        <form action=" {{ url('post/' . $post->id) }} " method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input type="submit" onclick="return confirm('Se va a eliminar el post #{{ $post->id }})')" class="btn btn-danger" value="Borrar"> 
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $posts->links() !!} 
            <!-- </div>
        </div>
    </div> -->
</div>
@endsection

@section('datatable')
<script>
    $(document).ready(function(){
        $('.data-table').DataTable({

        });
    });
</script>
@endsection
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script> -->
</body>
</html>