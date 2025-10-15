import './bootstrap'
import '../css/app.css'

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { createPinia } from 'pinia'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m'

// Optional: import router if you’ve set it up
// import router from './router'

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel'

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        // Create a single app instance
        const app = createApp({ render: () => h(App, props) })

        // Create and use Pinia before mounting
        const pinia = createPinia()
        app.use(pinia)

        // Register Inertia, Ziggy, and router (if any)
        app.use(plugin)
        app.use(ZiggyVue, Ziggy)
        // app.use(router)

        // Mount your single app instance
        app.mount(el)

        return app
    },
    progress: {
        color: '#4B5563',
    },
})
