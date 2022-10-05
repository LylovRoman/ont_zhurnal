export default {
    name: 'Popup',
    props: {
        inpopup: {
            type: Object,
            default: {}
        }
    },
    template: `
        <div style="top: 0; left: 0; z-index: 100; position: fixed; width: 100vw; height: 100vh; background: rgba(0, 0, 0, 0.7); display: flex; justify-content: center; align-items: center">
            <div style="width: 500px; height: 500px; background: #ffffff">
                <component :is="this.inpopup"></component>
            </div>
        </div>
    `,
}
