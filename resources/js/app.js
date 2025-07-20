import { createApp, h } from 'vue'
import { createInertiaApp, router } from '@inertiajs/vue3'
import NProgress from 'nprogress';
import '../css/nprogress-custom.css';

import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

NProgress.configure({
    //  turn off the spinner
    showSpinner: false,
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
  transition: "Vue-Toastification__bounce",
  maxToasts: 5,
  newestOnTop: true,
  transitionDuration: 400,
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
