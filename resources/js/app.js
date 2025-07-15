import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

// ✅ Optional: extract logic to a utility for cleanliness
function initMobileNav() {
  const toggleBtn = document.querySelector('.mobile-nav-toggle')
  const body = document.body

  if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
      body.classList.toggle('mobile-nav-active')
    })
  }

  const navLinks = document.querySelectorAll('.navmenu a')
  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      body.classList.remove('mobile-nav-active')
    })
  })
}

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })
    app.use(plugin)
    app.mount(el)

    // ✅ Run global DOM logic after app is mounted
    initMobileNav()
  },
})
