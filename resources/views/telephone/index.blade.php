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
<title> Listado de telephones </title>
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
    <a href="{{ url('telephone/create') }}" class="btn btn-success"> Registrar telephone</a>
    @if (Session::has('mensaje'))
        <br>
        <div class="alert alert-success">
            {{ Session::get('mensaje') }}
        </div>
    @endif
    <table class="table data-table table-light">
        <thead class="thead-light">
            <tr>
                <th> # </th>
                <th> User_id </th>
                <th> Telephone </th>
                <td> Ddescription </td>
                <th> Fecha de creación </th>
                <th> Ultima Actualización </th>
                <th> Acciones </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($telephones as $telephone)
                <tr>
                    <td> {{ $telephone->id }} </td>
                    <td> {{ $telephone->user_id }} </td>
                    <td> {{ $telephone->telephone }} </td>
                    <td> {{ $telephone->description}} </td>
                    <td> {{ $telephone->created_at }} </td>
                    <td> {{ $telephone->updated_at }} </td>
                    <td> 
                        <div class="btn-group" role="group">
                            <a href="{{ url('/telephone/' . $telephone->id . '/edit') }}" class="btn btn-warning"> Editar </a>   
                            <form action=" {{ url('telephone/' . $telephone->id) }} " method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('Se va a eliminar el telefono #{{ $telephone->id }})')" class="btn btn-danger" value="Borrar"> 
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $telephones ?? ''->links() !!} 
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