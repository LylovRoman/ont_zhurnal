import SmartTable from "./components/SmartTable.js";
import Popup from "./components/Popup.js";
import Inputs from "./components/Inputs.js";

window.addEventListener('DOMContentLoaded', (event) => {
    Vue.createApp({
        name: 'Application',
        data() {
            return {
                columns: {
                    id: 'ID',
                    predmet: 'Предмет',
                    gruppa: 'Группа',
                    sem1: '1 семестр',
                    sem2: '2 семестр',
                    itogo: 'Итого',
                    tip: 'Тип',
                    haracter: 'Характер'
                },
                posts: [],
                userActionPanel: [
                    {
                        title: 'Добавить',
                        cb: this.addNagruzka
                    },
                    {
                        title: 'Редактировать',
                        cb: this.editNagruzka
                    },
                    {
                        title: 'Удалить',
                        cb: this.deleteNagruzka
                    }
                ],
                inputs: [],
                action: '',
                popupcomponent: Inputs
            }
        },
        created() {
            this.getPosts();
        },
        methods: {
            getPosts(row) {
                fetch(`/api/nagruzka`)
                    .then(res => res.json())
                    .then(res => {
                        this.posts = res;
                    })
            },
            editNagruzka(row){
                fetch(`/api/nagruzka/${row.id}`)
                    .then(res => res.json())
                    .then(res => {
                        this.inputs = res[0];
                        console.log(this.inputs);
                        this.action = '/api/update/nagruzka';
                    });
            },
            deleteNagruzka(row){
                fetch(`/api/nagruzka/delete/${row.id}`)
                    .then(res => {
                        location.reload();
                    });
            },
            addNagruzka(){
                fetch(`/api/nagruzka/score/latest`)
                    .then(res => res.json())
                    .then(res => {
                        res.id++;
                        this.inputs = res;
                        this.action = '/api/add/nagruzka';
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
