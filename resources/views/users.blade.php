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
<title> Listado de Usuarios </title>
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
    <table class="table data-table table-light">
        <thead class="thead-light">
            <tr>
                <th> # </th>
                <th> Nombre </th>
                <th> Nº Post </th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $users as $user)
                <tr>
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->posts->count() }} </td> <!-- Aqui tengo que poner el numero de post pero no se como hacer un count de los post que tiene cada usuario -->
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->links() !!} 
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