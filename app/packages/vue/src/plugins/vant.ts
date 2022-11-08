import { ServicesModule } from '~/types'
import 'vant/lib/index.css'
import Vant from 'vant'
import { Locale } from 'vant'
import enUS from 'vant/es/locale/lang/en-US'

export const install: ServicesModule = ({ app }) => {
  Locale.use('en-US', enUS)
  app.use(Vant)
}
