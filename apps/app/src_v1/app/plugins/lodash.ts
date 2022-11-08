import { ServicesModule } from '~/types'
import _, { LoDashStatic } from 'lodash'

export const install: ServicesModule = ({ app }) => {
  app.config.globalProperties.$_ = _
}

declare module '@vue/runtime-core' {
  interface ComponentCustomProperties {
    $_: LoDashStatic
  }
}
