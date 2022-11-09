@extends('layouts.app')
@section('title')
    Дисциплины
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
        <h1>Специальности</h1>
        <smart-table ref="usersTable"
             :columns="this.columnsSpezTable"
             :rows="this.spezs"
             v-model:selected-rows="this.selectedSpez"
             @after-select-row="this.getDiscips"
             :multiple-select="false"
             :sticky-header="false"
             :action-panel-row="this.spezActionPanel"
        ></smart-table><br>
        <h1>Дисциплины</h1>
        <input-sort v-model:input-value="this.searchValue"></input-sort>
        <smart-table
            :columns="this.columnsDiscipTable"
            :rows="this.discips"
            :can-select-row="false"
            :action-panel-row="this.discipActionPanel"
        ></smart-table>
    <script src="./js/discip.js" type="module"></script>
@endsection
