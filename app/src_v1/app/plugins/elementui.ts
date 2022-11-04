import { ServicesModule } from '~/types'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'

export const install: ServicesModule = ({ app }) => {
  app.use(ElementPlus)
}
