@extends('layouts.app')
@section('title')
    Уроки
@endsection
@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Год</th>
                <th scope="col">Месяц</th>
                <th scope="col">Предмет</th>
                <th scope="col">Тип</th>
                <th scope="col">Группа</th>
                <th scope="col">Всего</th>
            </tr>
            </thead>
            <tbody>
            @foreach($uroki as $urok)
            <tr>
                <td>{{$urok->GOD}}</td>
                <td>{{$urok->MESYAC}}</td>
                <td>{{$urok->PREDMETNAME}}</td>
                <td>{{$urok->TIP}}</td>
                <td>{{$urok->GRUPPA}}</td>
                <td>{{$urok->VSEGO}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
