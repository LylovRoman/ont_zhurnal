export default {
    name: 'EmitButton',
    methods: {
        activate(){
            this.$emit('buttonClick');
        }
    },
    template: `
        <a @click="this.activate" style="margin-left: 10px; color: rgba(0, 0, 0, 20%); background-color: rgba(0, 0, 0, 0%); border: none; cursor: pointer;">+</a>
    `,
}
