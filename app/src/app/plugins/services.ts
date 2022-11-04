import { ServicesModule } from '~/types'
import $services, { ServicesInterface } from '~/app/services'

export const install: ServicesModule = ({ app }) => {
  app.provide('$services', $services)
}

declare module '@vue/runtime-core' {
  interface ComponentCustomProperties {
    $services: ServicesInterface
  }
}

