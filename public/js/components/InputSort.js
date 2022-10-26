export default {
    name: 'InputSort',
    data() {
        return {
            value: ''
        };
    },
    updated(){
        this.sortFunction();
    },
    methods: {
        sortFunction(){
            this.$emit('update:input-value', this.value);
        }
    },
    template: `
        <input v-model="value" type="text" placeholder="Найти по названию">
    `,
}
