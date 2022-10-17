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
        }
    },
    data(){
        return {
            active: false
        };
    },
    template: `
        <div v-if="this.active" @click="togglePopup" style="top: 0; left: 0; z-index: 100; position: fixed; width: 100vw; height: 100vh; background: rgba(0, 0, 0, 0.7); display: flex; justify-content: center; align-items: center">
            <div @click.stop style="background: #ffffff; padding: 20px;">
                <component :is="this.inpopup" :inputs="this.inputs" :action="this.action"></component>
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
