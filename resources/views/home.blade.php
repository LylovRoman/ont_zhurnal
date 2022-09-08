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
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="uroki">Уроки</a>
                    <a href="nagruzka">Нагрузка</a>
                    {{ __('ССЫЛКА 3') }}
                    {{ __('ССЫЛКА 4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
