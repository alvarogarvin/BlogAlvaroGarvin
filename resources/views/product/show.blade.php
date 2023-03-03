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
<title> Producto {{ $product->id }} </title>
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th> # </th>
                <th> Name </th>
                <th> Quantity </th>
                <th> Status </th>
                <th> Seller_id </th>
                <th> Fecha de creación </th>
                <th> Ultima Actualización </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> {{ $product->id }} </td>
                <td> {{ $product->name }} </td>
                <td> {{ $product->quantity }} </td>
                <td> {{ $product->status }} </td>
                <td> {{ $product->seller_id }} </td>
                <td> {{ $product->created_at }} </td>
                <td> {{ $product->updated_at }} </td>
                <td> <a href="{{ url('product') }}"> Volver </a> </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script> -->
</body>
</html>