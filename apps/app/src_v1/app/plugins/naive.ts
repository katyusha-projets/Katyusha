import { ServicesModule } from '~/types'
import naive from 'naive-ui'

export const install: ServicesModule = ({ app }) => {
  app.use(naive)
}
