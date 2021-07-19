@extends('layout.master')
@section('content')
    <table class="table m-4">
    <h1 class="pl-3">roles <a href="/role/create" class="btn btn-info btn-sm"> add new role</a></h1>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">mobile</th>
            <th scope="col">role</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>

            <th scope="row">1</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->mobile}}</td>
            <td>{{$user->role->title}}</td>
            <td><a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-info"> edit</a></td>
            <td><form method="post" action="/users/{{$user->id}}">
                @csrf
                    @method('DELETE')
                    <input class="btn btn-sm btn-danger" type="submit" value="delete"/>
            </form></td>
        </tr>
        @endforeach

        </tbody>
    </table>
@endsection
