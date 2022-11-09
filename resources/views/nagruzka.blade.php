@extends('layouts.app')
@section('title')
    Нагрузка
@endsection
@section('content')
    <popup
        :inpopup="this.popupcomponent"
        :inputs="this.inputs"
        :action="this.action"
        :titles="this.columns"
    >
        {{ csrf_field() }}
    </popup>
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
