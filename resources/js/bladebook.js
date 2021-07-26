import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'

Prism = require('prismjs')

window.Alpine = Alpine
Alpine.plugin(persist)
Alpine.start()


window.$events = {
    record: function (event, $dispatch) {
        $dispatch('event', { name: event.type, details: event.detail })
    },
}
