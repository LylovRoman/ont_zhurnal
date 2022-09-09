import SmartTable from "./components/Index.js";

window.addEventListener('DOMContentLoaded', (event) => {
    Vue.createApp({
        name: 'Application',
        data() {
            return {
                columns: {
                    GOD: 'Год',
                    MESYAC: 'Месяц',
                    PREDMETNAME: 'Предмет',
                    TIP: 'Тип',
                    GRUPPA: 'Группа',
                    VSEGO: 'Всего'
                },
                posts: [],
            }
        },
        created() {
            this.getPosts();
        },
        methods: {
            getPosts() {
                fetch(`/api/uroki`)
                    .then(res => res.json())
                    .then(res => {
                        this.posts = res;
                        console.log(res)
                    })
            },
        },
        components: {
            SmartTable
        }
    }).mount('#app');
})
