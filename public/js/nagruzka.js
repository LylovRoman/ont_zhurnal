import SmartTable from "./components/Index.js";

window.addEventListener('DOMContentLoaded', (event) => {
    Vue.createApp({
        name: 'Application',
        data() {
            return {
                columns: {
                    discipName: 'Предмет',
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
                        title: 'Получить посты',
                        cb: this.getPosts
                    },
                ]
            }
        },
        created() {
            this.getPosts();
        },
        methods: {
            getPosts(row) {
                console.log(row)
                fetch(`/api/nagruzka`)
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
