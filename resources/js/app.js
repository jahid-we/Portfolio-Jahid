import { createApp, h } from 'vue'
import { createInertiaApp, router } from '@inertiajs/vue3'
import NProgress from 'nprogress';
import '../css/nprogress-custom.css';

import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

NProgress.configure({
  showSpinner: false, // 🔴 turn off the spinner
})

// Toast config (optional)
const toastOptions = {
  // Customize as needed
  timeout: 3000,
  position: "top-right",
  closeOnClick: true,
  pauseOnFocusLoss: true,
  pauseOnHover: true,
  draggable: true,
  draggablePercent: 0.6,
}

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })
    app.use(plugin)
    app.use(Toast, toastOptions)
    app.mount(el)

  },
})
// ✅ NProgress loader
router.on('start', () => NProgress.start());
router.on('finish', () => NProgress.done());
