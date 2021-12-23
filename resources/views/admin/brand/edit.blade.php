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
<form action="{{route('admin.brand.update', ['brand' => $brand])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{$brand->name}}">
    <br>
    <input type="file" name="logo">
    <br>
    <input type="checkbox" name="status" value="1" checked="{{$brand->status}}">
    <br>
    <textarea name="description" id="" cols="30" rows="10">{{$brand->description}}</textarea>
    <br>
    <input type="text" name="creation_year" value="{{$brand->creation_year}}">
    <br>
    <button type="submit" name="send" class="btn-success btn btn-sm">Send</button>
</form>
</body>
</html>
@endsection()
