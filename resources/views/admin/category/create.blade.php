@extends('layouts.admin')
@section('content')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@dump($errors)
<form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name">
    <br>
    <input type="checkbox" name="status" value="1">
    <br>
    <input type="text" name="creation_year">
    <br>
    <button type="submit" name="send" class="btn-success btn btn-sm">Send</button>
</form>
</body>
</html>
@endsection()
