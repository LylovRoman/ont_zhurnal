import SmartTable from "./components/SmartTable.js";
import Popup from "./components/Popup.js";
import Inputs from "./components/Inputs.js";
import InputSort from "./components/InputSort.js";


window.addEventListener('DOMContentLoaded', (event) => {
    Vue.createApp({
        name: 'Application',
        data() {
            return {
                searchValue: '',
                popupcomponent: Inputs,
                columnsSpezTable: {
                    kod: 'Код',
                    name: 'Название'
                },
                columnsDiscipTable: {
                    name: 'Название',
                    spez: 'Специальность',
                    sokr: 'Сокращение'
                },
                discipActionPanel: [
                    {
                        title: 'Добавить',
                        cb: this.addDiscip
                    },
                    {
                        title: 'Редактировать',
                        cb: this.editDiscip
                    },
                    {
                        title: 'Удалить',
                        cb: this.deleteDiscip
                    }
                ],
                spezActionPanel: [
                    {
                        title: 'Добавить',
                        cb: this.addSpez
                    },
                    {
                        title: 'Редактировать',
                        cb: this.editSpez
                    },
                    {
                        title: 'Удалить',
                        cb: this.deleteSpez
                    }
                ],
                spezs: [],
                discips: [],
                selectedSpez: [],
                inputs: [],
                action: ''
            }
        },
        created() {
            this.getSpezs();
        },
        watch: {
            searchValue: function() {
                this.sortDiscips(this.selectedSpez, this.searchValue)
            }
        },
        methods: {
            editSpez(selectedSpez){
                fetch(`/api/spez/${selectedSpez.kod}`)
                    .then(res => res.json())
                    .then(res => {
                        this.inputs = res[0];
                        this.action = '/api/update/spez';
                    });
            },
            addSpez(){
                fetch(`/api/spez/score/latest`)
                    .then(res => res.json())
                    .then(res => {
                        this.inputs = res;
                        this.action = '/api/add/spez';
                    });
            },
            refreshUsers(selectedSpez, refresh) {
                refresh();
            },
            deleteSpez(selectedSpez){
                fetch(`/api/spez/delete/${selectedSpez.kod}`)
                    .then(res => {
                        location.reload();
                    });
            },
            editDiscip(selectedSpez){
                fetch(`/api/discip/edit/${selectedSpez.kod}`)
                    .then(res => res.json())
                    .then(res => {
                        this.inputs = res[0];
                        this.action = '/api/update/discip';
                    });
            },
            addDiscip(){
                fetch(`/api/discip/score/latest`)
                    .then(res => res.json())
                    .then(res => {
                        res.kod++;
                        this.inputs = res;
                        this.action = '/api/add/discip';
                    });
            },
            deleteDiscip(selectedSpez){
                fetch(`/api/discip/delete/${selectedSpez.kod}`)
                    .then(res => {
                        location.reload();
                    });
            },
            getSpezs(){
                fetch('/api/spezs')
                    .then(res => res.json())
                    .then(res => {
                        this.spezs = res;
                    })
            },
            getDiscips(selectedSpez) {
                if(selectedSpez) {
                    fetch(`/api/discip/${selectedSpez.kod}`)
                        .then(res => res.json())
                        .then(res => {
                            this.discips = res;
                        })
                } else {
                    this.discips = [];
                }
            },
            sortDiscips(selectedSpez, search) {
                if (!search){
                    this.getDiscips(selectedSpez)
                } else {
                    fetch(`/api/discip/sort/${selectedSpez.kod}/${search}`)
                        .then(res => res.json())
                        .then(res => {
                            this.discips = res;
                        })
                }
            }
        },
        components: {
            SmartTable,
            Popup,
            Inputs,
            InputSort
        }
    }).mount('#app');
})
