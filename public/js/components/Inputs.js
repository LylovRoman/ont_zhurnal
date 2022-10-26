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
        action: {
            type: String,
            default: ''
        }
    },
    mounted() {
        this.counter = 0;
        for (let key in this.inputs) {
            this.counter++;
        }
        this.number = 0;
        let inputColumn = new Object();
        for (let input in this.inputs) {
            inputColumn[input] = this.inputs[input];
            this.number++;
            if (this.number % this.columnHeight == 0){
                this.inputColumns.push(inputColumn);
                inputColumn = new Object();
            }
        }
        if (this.number % this.columnHeight != 0){
            this.inputColumns.push(inputColumn);
        }
    },
    template: `
        <form :action="this.action" method="POST">
            <input type="hidden" name="_token" :value="csrf">
            <div style="display: flex; flex-direction: row;">
                <div v-for="(inputColumn, key) in inputColumns" style="display: flex; flex-direction: column; flex-wrap: wrap; width: 230px">
                    <template v-for="(input, name, index) in inputColumn">
                            <h2>{{name}}:</h2>
                            <input :readonly="false" :name="name" type="text" :value="input" style="width: 200px;">
                    </template>
                </div>
            </div>
            <input type="submit" style="margin-top: 20px">
        </form>
    `,
}
