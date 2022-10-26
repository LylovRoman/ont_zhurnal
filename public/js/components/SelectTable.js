export default {
    name: 'SelectTable',
    data() {
        return {
            value: 0
        };
    },
    props: {
        action: {
            type: String,
            default: ''
        }
    },
    updated(){
        this.selectFunction();
    },
    methods: {
        selectFunction(){
            fetch(this.action + this.value)
                .then(res => res.json())
                .then(res => {
                    console.log(this.action + this.value);
                })
        }
    },
    template: `
        <select v-model="this.value">
            <option value="0">Всё</option>
            <option value="1">Январь</option>
            <option value="2">Февраль</option>
            <option value="3">Март</option>
            <option value="4">Апрель</option>
            <option value="5">Май</option>
            <option value="6">Июнь</option>
            <option value="7">Июль</option>
            <option value="8">Август</option>
            <option value="9">Сентябрь</option>
            <option value="10">Октябрь</option>
            <option value="11">Ноябрь</option>
            <option value="12">Декабрь</option>
        </select>
    `,
}
