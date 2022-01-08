@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-8">
            <h1>Пользователи форума:</h1>
            <div class="list-group">
                @foreach($users as $user)
                <div class="list-group-item list-group-item-action flex-column">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Имя: {{$user->name}}</h5>

                        <small>С нами с {{$user->created_at->format('d/m/Y')}}</small>
                    </div>
                    <h5 class="mb-1">Email: {{$user->email}}</h5>

                </div>
                @endforeach
            </div>

</div>
@endsection
