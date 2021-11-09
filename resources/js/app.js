require('./bootstrap');
import "tailwindcss/tailwind.css"
import * as Vue from 'vue'
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'

import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import {faCheckSquare, faTrash,} from '@fortawesome/free-solid-svg-icons'
library.add(faTrash, faCheckSquare);


//Vue.component('font-awesome-icon', FontAwesomeIcon)

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
})
