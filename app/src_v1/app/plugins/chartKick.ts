import { ServicesModule } from '~/types'
import VueChartkick from 'vue-chartkick'
import 'chartkick/chart.js'

export const install: ServicesModule = ({ app }) => {
  app.use(VueChartkick)
}
