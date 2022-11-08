import viteSSR from 'vite-ssr'
import {RouteRecordRaw} from "vue-router";
import {Component} from "vue";

// import './scss/main.scss'
// import './static/styles/template.css'
// import './static/styles/fontawesome/css/fontawesome.min.css'
// import './static/styles/fontawesome/css/light.min.css'

// import './static/fonts/averta/style.css'

// import './static/scss/app.scss'

export interface ICreateVueApp {
  routes: RouteRecordRaw[]
  App: Component
}


// https://github.com/antfu/vite-ssg
export const createVueApp = (params: ICreateVueApp) => viteSSR(
  params.App,
  { routes: params.routes },
  (ctx) => {
    Object.values(import.meta.glob<{ install: any }>('./plugins/*.ts', { eager: true })).forEach(i => i.install?.(ctx))
  }
)
