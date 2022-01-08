@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-8">
            <h1>Список тем на форуме:</h1>
            <ul class="list-group">
                @foreach($topics as $topic)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-10">

                            <h2><strong>Тема:</strong> {{$topic->name}}</h2>
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

                           <a class="btn btn-primary btn-lg mt-4" href="/topic/{{$topic->id}}">Смотреть</a>


                       </div>

                   </div>
                    <div class="row">
                        <div class="col-3"><strong>Создатель: </strong>  {{$topic->user->name}}</div>
                        <div class="col"><strong>Почта: </strong>  {{$topic->user->email}}</div>
                    </div>

                </li>
                @endforeach
            </ul>
        </div>
        @if(Auth::check())
        <div class="card p-3 w-75 h-25 col sticky-top">
            <h1>Добавление новой темы:</h1><br>
            <form action="/topic" method="post">
                @csrf
                <div class="form-group h3">
                    <label for="name">Название темы</label>
                    <input type="text" class="form-control mt-3" name="name" id="name">
                    @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3 h4">
                    <label for="body">Описание темы</label>
                    <textarea class="form-control mt-3" name="body" id="body" rows="4"></textarea>
                    @error('body')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success btn-lg mt-2">Подтвердить</button>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection
