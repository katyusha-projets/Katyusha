import { setupLayouts } from 'virtual:generated-layouts'
import App from './App.vue'
import generatedRoutes from '~pages'
import {createVueApp} from '@app/vue/createVueApp'

const routes = setupLayouts(generatedRoutes)
export const createApp = createVueApp({routes, App})
