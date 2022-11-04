import { Action } from '~/app/actions/Action'
import { LoginRegisterDTO } from '~/app/DTOs/LoginRegisterDTO'
import StateLoaders from '~/store/StateLoaders'

export default class LoginRegisterAction extends Action {
  protected static urlPath: string = 'customer/login-or-register'

  public static async run(dto: LoginRegisterDTO): Promise<void> {
    await this.sendRequest(dto)
    await StateLoaders.loadCurrentSession()
  }
}
