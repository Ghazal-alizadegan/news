@extends('layout.master')
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
<div class="mr-2"></div>
<h1>PROFILE</h1>
<div class="form-group ">
    <label class="pl-4">name:</label>
    <p  class="pl-4">{{$user->name}}</p>
    <label class="pl-4">email:</label>
    <p  class="pl-4">{{$user->email}}</p>
    <label class="pl-4">mobile:</label>
    <p  class="pl-4">{{$user->mobile}}</p>
    <p   class="pl-4"> <a  type="submit" class=" btn btn-danger btn-sm " href="/profile/edit">edit</a></p>
</div>
</body>
</html>
@endsection
