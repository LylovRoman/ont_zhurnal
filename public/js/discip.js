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
                        title: 'Редактировать',
                        cb: this.editSpez
                    }
                ],
                spezActionPanel: [
                    {
                        title: 'Редактировать',
                        cb: this.editSpez
                    },
                    {
                        title: 'Обновить список',
                        cb: this.refreshUsers
                    }
                ],
                spezs: [],
                discips: [],
                selectedSpez: [],
                inputs: []
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
                        console.log(res[0]);
                        this.inputs = res[0];
                    })
            },
            refreshUsers(row, refresh) {
                refresh();
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
