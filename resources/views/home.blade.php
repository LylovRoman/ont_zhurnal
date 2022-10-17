@extends('layouts.app')
@section('title')
    Главная
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert"></div>
                    @endif

                    <a href="vychitka">Вычитка</a>
                    <a href="discip">Дисциплины</a>
                    <a href="nagruzka">Нагрузка</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
