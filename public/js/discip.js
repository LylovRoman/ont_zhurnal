import SmartTable from "./components/SmartTable.js";

window.addEventListener('DOMContentLoaded', (event) => {
    Vue.createApp({
        name: 'Application',
        data() {
            return {
                columnsSpezTable: {
                    kod: 'Код',
                    name: 'Название'
                },
                columnsDiscipTable: {
                    name: 'Название',
                    spez: 'Специальность',
                    sokr: 'Сокращение'
                },
                spezActionPanel: [
                    {
                        title: 'Получить посты',
                        cb: this.getPosts
                    },
                    {
                        title: 'Обновить список',
                        cb: this.refreshUsers
                    }
                ],
                spezs: [],
                discips: [],
                selectedSpez: []
            }
        },
        created() {
            this.getSpezs();
        },
        methods: {
            refreshUsers(row, refresh) {
                refresh();
            },
            getSpezs(){
                fetch('/api/spez')
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
            SmartTable
        }
    }).mount('#app');
})
