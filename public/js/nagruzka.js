import SmartTable from "./components/SmartTable.js";
import Popup from "./components/Popup.js";
import Inputs from "./components/Inputs.js";
import EmitButton from "./components/EmitButton.js";

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
                        res.forEach(element => {
                            element.predmet = element.discip.name;
                        })
                        this.posts = res;
                    })
            },
            editNagruzka(row){
                fetch(`/api/nagruzka/${row.id}`)
                    .then(res => res.json())
                    .then(res => {
                        delete res[0].itogo;
                        this.inputs = res[0];
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
                        res.predmet = undefined;
                        res.sem1 = 0;
                        res.sem2 = 0;
                        res.haracter = undefined;
                        res.tip = undefined;
                        res.gruppa = undefined;
                        delete res.itogo;
                        res.id++;
                        this.inputs = res;
                        this.action = '/api/add/nagruzka';
                    });
            }
        },
        components: {
            SmartTable,
            Popup,
            Inputs,
            EmitButton
        }
    }).mount('#app');
})
