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
<title> {{ $post->nombre }} {{ $post->apellido }} </title>
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th> # </th>
                <th> User_id </th>
                <th> Title </th>
                <th> Status </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> {{ $post->id }} </td>
                <td> {{ $post->user_id }} </td>
                <td> {{ $post->title }} </td>
                <td> {{ $post->status }} </td>
                <td> {{ $post->created_at }} </td>
                <td> {{ $post->updated_at }} </td>
                <td> <a href="{{ url('post') }}"> Volver </a> </td>
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