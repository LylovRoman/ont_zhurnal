import SmartTable from "./components/SmartTable.js";
import Popup from "./components/Popup.js";
import Inputs from "./components/Inputs.js";


window.addEventListener('DOMContentLoaded', (event) => {
    Vue.createApp({
        name: 'Application',
        data() {
            return {
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
        methods: {
            editSpez(row){
                fetch(`/api/spez/${row.kod}`)
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
            refreshUsers(row, refresh) {
                refresh();
            },
            deleteSpez(row){
                fetch(`/api/spez/delete/${row.kod}`)
                    .then(res => {
                        location.reload();
                    });
            },
            editDiscip(row){
                fetch(`/api/discip/edit/${row.kod}`)
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
            deleteDiscip(row){
                fetch(`/api/discip/delete/${row.kod}`)
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
            getDiscips(row) {
                if(row) {
                    fetch(`/api/discip/${row.kod}`)
                        .then(res => res.json())
                        .then(res => {
                            this.discips = res;
                        })
                } else {
                    this.discips = [];
                }
            }
        },
        components: {
            SmartTable,
            Popup,
            Inputs
        }
    }).mount('#app');
})
