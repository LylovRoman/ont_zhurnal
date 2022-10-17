import SmartTable from "./components/SmartTable.js";
import Popup from "./components/Popup.js";
import Inputs from "./components/Inputs.js";


window.addEventListener('DOMContentLoaded', (event) => {
    Vue.createApp({
        name: 'Application',
        data() {
            return {
                popupcomponent: Inputs,
                columns: {
                    GOD: 'Год',
                    MESYAC: 'Месяц',
                    PREDMETNAME: 'Предмет',
                    TIP: 'Тип',
                    GRUPPA: 'Группа',
                    VSEGO: 'Всего'
                },
                posts: [],
                vychitkaActionPanel: [
                    {
                        title: 'Добавить',
                        cb: this.addVychitka
                    },
                    {
                        title: 'Редактировать',
                        cb: this.editVychitka
                    },
                    {
                        title: 'Удалить',
                        cb: this.deleteVychitka
                    }
                ],
                inputs: [],
                action: ''
            }
        },
        created() {
            this.getPosts();
        },
        methods: {
            getPosts() {
                fetch('/api/vychitka')
                    .then(res => res.json())
                    .then(res => {
                        this.posts = res;
                    })
            },
            editVychitka(row){
                fetch(`/api/vychitka/${row.KOD}`)
                    .then(res => res.json())
                    .then(res => {
                        this.inputs = res[0];
                        this.action = '/api/update/vychitka';
                    });
            },
            addVychitka(){
                fetch(`/api/vychitka/score/latest`)
                    .then(res => res.json())
                    .then(res => {
                        res.KOD++;
                        this.inputs = res;
                        this.action = '/api/add/vychitka';
                    });
            },
            deleteVychitka(row){
                fetch(`/api/vychitka/delete/${row.KOD}`)
                    .then(res => {
                        location.reload();
                    });
            }
        },
        components: {
            SmartTable,
            Popup,
            Inputs
        }
    }).mount('#app');
})
