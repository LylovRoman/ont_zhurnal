@extends('layouts.app')
@section('scripts')
    <script src="/js/uroki.js" defer type="module"></script>
@endsection
@section('title')
    Уроки
@endsection
@section('content')
    <div class="container">
        <smart-table
            :columns="this.columns"
            :rows="this.posts"
            :can-select-row="false"
        />
    </div>
@endsection
