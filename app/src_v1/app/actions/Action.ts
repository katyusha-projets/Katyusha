import axios from 'axios'
import apiConfig from '~/app/config/apiConfig'

export abstract class Action {
  protected static urlPath: string

  protected static async sendRequest(data: object, urlPath?: string): Promise<boolean> {
    const request = await axios.post(`${apiConfig.url()}/action/${urlPath ? urlPath : this.urlPath}/`, data)
    return !!request.data
  }
}
