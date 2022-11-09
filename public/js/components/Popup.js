export default {
    name: 'Popup',
    props: {
        inpopup: {
            type: Object,
            default: {}
        },
        inputs: {
            type: Object,
            default: {}
        },
        action: {
            type: String,
            default: ''
        },
        titles: {
            type: Object,
            default: {}
        },
    },
    data(){
        return {
            active: false
        };
    },
    template: `
        <div v-if="this.active" @mousedown="togglePopup" style="top: 0; left: 0; z-index: 100; position: fixed; width: 100vw; height: 100vh; background: rgba(0, 0, 0, 0.7); display: flex; justify-content: center; align-items: center">
            <div @mousedown.stop style="border-radius: 30px; background: #ffffff; padding: 30px; display: flex; flex-direction: row; justify-content: center">
                <component :is="this.inpopup" :inputs="this.inputs" :action="this.action" :titles="this.titles"></component>
            </div>
        </div>
    `,
    watch: {
      inputs(){
          this.active = true;
      }
    },
    methods: {
        togglePopup(){
            this.active = !this.active;
        }
    }
}
