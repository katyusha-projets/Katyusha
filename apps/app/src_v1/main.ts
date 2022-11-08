import { ViteSSG } from 'vite-ssg'
import { setupLayouts } from 'virtual:generated-layouts'
import App from './App.vue'
import type { UserModule } from './types'
import generatedRoutes from '~pages'

import '@unocss/reset/tailwind.css'
import './styles/variables.css'
import './styles/main.css'
import '@tabler/core/dist/css/tabler.css'
import './styles/elements.css'
import './styles/typography.css'
import './assets/fonts/averta/style.css'
import './assets/fonts/ambient/style.css'
import './styles/fontawesome/css/fontawesome.min.css'
import './styles/fontawesome/css/light.min.css'
import 'uno.css'

import '@purge-icons/generated'
import '@vueform/slider/themes/default.scss'
import 'vue3-carousel/dist/carousel.css'
import './scss/main.scss'
import './styles/tailwind.css'

const routes = setupLayouts(generatedRoutes)

// https://github.com/antfu/vite-ssg
export const createApp = ViteSSG(
  App,
  { routes, base: import.meta.env.BASE_URL },
  (ctx) => {
    Object.values(import.meta.glob<{ install: UserModule }>('./app/plugins/*.ts', { eager: true })).forEach(i => i.install?.(ctx))
    Object.values(import.meta.glob<{ install: UserModule }>('./app/plugins/*.ts', { eager: true })).forEach(i => i.install?.(ctx))
  }
)
