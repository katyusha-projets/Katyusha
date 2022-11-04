import { setupLayouts } from 'virtual:generated-layouts'
import App from './App.vue'
import generatedRoutes from '~pages'
import viteSSR from 'vite-ssr'

// import './scss/main.scss'
// import './static/styles/template.css'
// import './static/styles/fontawesome/css/fontawesome.min.css'
// import './static/styles/fontawesome/css/light.min.css'

// import './static/fonts/averta/style.css'

// import './static/scss/app.scss'

const routes = setupLayouts(generatedRoutes)

// https://github.com/antfu/vite-ssg
export const createApp = viteSSR(
  App,
  { routes },
  (ctx) => {
    Object.values(import.meta.glob<{ install: any }>('./app/plugins/*.ts', { eager: true })).forEach(i => i.install?.(ctx))
    Object.values(import.meta.glob<{ install: any }>('./app/plugins/*.ts', { eager: true })).forEach(i => i.install?.(ctx))
  }
)
