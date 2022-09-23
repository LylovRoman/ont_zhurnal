@extends('layouts.app')
@section('title')
    Вычитка
@endsection
@section('content')
    <div class="container">
        <smart-table
            :columns="this.columns"
            :rows="this.posts"
            :can-select-row="false"
        />
    </div>
    <script src="./js/vychitka.js" type="module"></script>
@endsection
