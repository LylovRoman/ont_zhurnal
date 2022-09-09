@extends('layouts.app')
@section('scripts')
    <script src="/js/nagruzka.js" defer type="module"></script>
@endsection
@section('title')
    Нагрузка
@endsection
@section('content')
    <div class="container">
        <smart-table
            :columns="this.columns"
            :rows="this.posts"
            :can-select-row="false"
            :action-panel-row="this.userActionPanel"
        />
    </div>
@endsection
