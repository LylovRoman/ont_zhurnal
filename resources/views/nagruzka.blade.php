@extends('layouts.app')
@section('title')
    Нагрузка
@endsection
@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Предмет</th>
                <th scope="col">Группа</th>
                <th scope="col">1 семестр</th>
                <th scope="col">2 семестр</th>
                <th scope="col">Итого</th>
                <th scope="col">Тип</th>
                <th scope="col">Характер</th>
            </tr>
            </thead>
            <tbody>
            @foreach($nagruzki as $nagruzka)
            <tr>
                <td>{{$nagruzka->discip->name}}</td>
                <td>{{$nagruzka->gruppa}}</td>
                <td>{{$nagruzka->sem1}}</td>
                <td>{{$nagruzka->sem2}}</td>
                <td>{{$nagruzka->itogo}}</td>
                <td>{{$nagruzka->tip}}</td>
                <td>{{$nagruzka->haracter}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
