@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="container">
        <div class="row">
        <div class="col-10">

            <h2><strong>Тема:</strong> {{$topic->name}}</h2>
            <div class="row">
                <div class="col-3"><strong>Создатель: </strong>  {{$topic->user->name}}</div>
                <div class="col"><strong>Почта: </strong>  {{$topic->user->email}}</div>
            </div>

        </div>
        <div class="col">
            <small>Создана: <br>
                {{$topic->created_at->format('d/m/Y')}}

            </small>

        </div>
    </div>
        <div class="row">
        <div class="col-9">
            <h4><strong>Описание:</strong> {{$topic->body}}</h4>
        </div>
        <div class="col text-center">
            <a class="btn btn-primary btn-lg mt-4" href="/topic">Вернуться к остальным темам</a>
        </div>
    </div>
    </div>
    @if(Auth::check())
        <div class="card p-3 w-75 h-25 col ">
            <form action="/topic/{{$topic->id}}" method="post">
                @csrf
                <div class="form-group h3">
                    <label for="name">Название поста</label>
                    <input type="text" class="form-control mt-3" name="name" id="name">
                    @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3 h4">
                    <label for="body">Описание</label>
                    <textarea class="form-control mt-3" name="body" id="body" rows="4"></textarea>
                    @error('body')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success btn-lg mt-2">Подтвердить</button>
            </form>

        </div>
    @else
        <div class="container mt-3 p-3">
            <h1 class="display-6 alert alert-warning">Авторизуйтесь, чтобы создать пост</h1>
        </div>
    @endif

    <div class="container">
        <h1>Список постов:</h1>
        @foreach($posts as $post)
            <li class="list-group-item">

                        <h2><strong>Тема поста:</strong> {{$post->name}}</h2>


                        <small>Пост создан: {{$post->created_at->format('d/m/Y')}}

                        </small>


                <div class="row">
                    <div class="col-9">
                        <h4>{{$post->body}}</h4>
                    </div>
                </div>

                @if(Auth::check() && Auth::user()->id == $post->user_id)
                <a href="/update/{{$post->id}}/user/{{$post->user_id}}" type="button" class="btn btn-primary btn-lg">Редактировать пост</a>
                @endif

            </li>
        @endforeach
    </div>


</div>
@endsection
