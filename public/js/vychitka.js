import SmartTable from "./components/SmartTable.js";
import Popup from "./components/Popup.js";
import Inputs from "./components/Inputs.js";
import SelectTable from "./components/SelectTable.js";
import EmitButton from "./components/EmitButton.js";

window.addEventListener('DOMContentLoaded', (event) => {
    Vue.createApp({
        name: 'Application',
        data() {
            return {
                popupcomponent: Inputs,
                columns: {
                    KOD: 'Код',
                    GOD: 'Год',
                    MESYAC: 'Месяц',
                    PREDMET: 'Предмет',
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
                action: '',
                selectAction: 'vychitka/filter/'
            }
        },
        methods: {
            getPosts(monthValue) {
                fetch(`/api/vychitka?month=${monthValue}`)
                    .then(res => res.json())
                    .then(res => {
                        res.forEach(element => {
                            element.PREDMET = element.PREDMETNAME;
                            switch (element.MESYAC){
                                case 1:
                                    element.MESYAC = 'Январь'
                                    break;
                                case 2:
                                    element.MESYAC = 'Февраль'
                                    break;
                                case 3:
                                    element.MESYAC = 'Март'
                                    break;
                                case 4:
                                    element.MESYAC = 'Апрель'
                                    break;
                                case 5:
                                    element.MESYAC = 'Май'
                                    break;
                                case 6:
                                    element.MESYAC = 'Июнь'
                                    break;
                                case 7:
                                    element.MESYAC = 'Июль'
                                    break;
                                case 8:
                                    element.MESYAC = 'Август'
                                    break;
                                case 9:
                                    element.MESYAC = 'Сентябрь'
                                    break;
                                case 10:
                                    element.MESYAC = 'Октябрь'
                                    break;
                                case 11:
                                    element.MESYAC = 'Ноябрь'
                                    break;
                                case 12:
                                    element.MESYAC = 'Декабрь'
                                    break;
                            }
                        })
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
                        res.MESYAC = undefined;
                        res.GOD = undefined;
                        res.PREDMET = undefined;
                        res.TIP = undefined;
                        res.GRUPPA = undefined;
                        res.VSEGO = undefined;
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
            Inputs,
            SelectTable,
            EmitButton
        }
    }).mount('#app');
})
