import 'alpinejs'
Prism = require('prismjs')

window.$events = {
    record: function (event, $dispatch) {
        $dispatch('event', { name: event.type, details: event.detail })
    },
}
