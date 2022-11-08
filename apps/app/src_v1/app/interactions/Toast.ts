import { Toast as t } from 'vant'
import { ToastWrapperInstance } from 'vant/lib/toast/types'

export default class Toast {

  public static loading(): ToastWrapperInstance {
    return t.loading({ message: 'Loading...', forbidClick: true, loadingType: 'spinner' })
  }

  public static success(message: string): ToastWrapperInstance {
    return t.success(message)
  }

  public static addedToCart(): ToastWrapperInstance {
    return this.success('Added')
  }

  public static lineItemRemoved(): ToastWrapperInstance {
    return this.success('Removed')
  }
}
