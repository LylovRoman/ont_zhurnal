export default {
    name: 'Inputs',
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            counter: 0,
            number: 0,
            columnHeight: 7,
            inputColumns: []
        };
    },
    props: {
        inputs: {
            type: Object,
            default: {}
        },
        titles: {
            type: Object,
            default: {}
        },
        action: {
            type: String,
            default: ''
        }
    },
    template: `
        <form :action="this.action" method="POST">
            <input type="hidden" name="_token" :value="csrf">
            <div style="display: flex; flex-direction: column;">
                <template v-for="(input, name, index) in inputs">
                    <template v-if="this.titles[name]">
                        <h2>{{this.titles[name]}}:</h2>
                        <input :readonly="false" :name="name" type="text" :value="input" style="width: 200px;">
                    </template>
                </template>
            </div>
            <input type="submit" style="margin-top: 20px; align-self: center">
        </form>
    `,
}
