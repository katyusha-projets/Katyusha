import { ServicesModule } from '~/types'

const useComponents = (components: Record<string, unknown>) => {
  Object.entries(components).forEach(([path, definition]) => {
    // @ts-ignore
    const componentName = path.split('/').pop().replace(/\.\w+$/, '')
    // @ts-ignore
    app.component(componentName, definition.default)
  })
}

export const install: ServicesModule = ({ app }) => {
  useComponents(import.meta.globEager('./../../components/debugging'))
  useComponents(import.meta.globEager('./../../components/common'))
  useComponents(import.meta.globEager('./../../components/layout'))
}
