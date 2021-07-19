@extends('layout.master')
@section('content')
    <ul>
        @foreach($categories as $cat)
            <li class="mt-5">{{$cat->title}}   <a href="/categories/{{$cat->title}}/edit" class="btn btn-sm btn-info">edit</a>
                <form action="/categories/{{$cat->title}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input value="delete" name="delete" type="submit" class="btn btn-sm btn-danger"/>

            </form>
            </li>
            <hr/>
        @endforeach
    </ul>
    @include('layout.errors')
@endsection
