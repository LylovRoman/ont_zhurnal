@extends('layouts.app')
@section('title')
    Вычитка
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
        <h1>Вычитка
            <emit-button
                @button-click="this.addVychitka"
            ></emit-button>
        </h1>
        <select-table
            @change-value="this.getPosts"
        ></select-table>
        <smart-table
            :columns="this.columns"
            :rows="this.posts"
            :can-select-row="false"
            :action-panel-row="this.vychitkaActionPanel"
        />
    </div>
    <script src="./js/vychitka.js" type="module"></script>
@endsection
