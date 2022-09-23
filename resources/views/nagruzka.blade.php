@extends('layouts.app')
@section('scripts')
    <script src="/js/nagruzka.js" defer type="module"></script>
@endsection
@section('title')
    Нагрузка
@endsection
@section('content')
    <div class="container">
        <h1>Нагрузка</h1>
        <smart-table
            :columns="this.columns"
            :rows="this.posts"
            :can-select-row="false"
            :action-panel-row="this.userActionPanel"
        />
    </div>
    <script src="./js/nagruzka.js" type="module"></script>
@endsection
