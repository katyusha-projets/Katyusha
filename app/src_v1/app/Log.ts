import { Ref } from 'vue-demi'
import { IHttpRequestLogItem } from '~/app/interfaces/LoggerInterfaces'

export default class Log {
  protected static _httpRequests: Ref<Array<IHttpRequestLogItem>> = ref([])
  protected static _messages: Ref<Array<string>> = ref([])

  public static logHttpRequest(request: IHttpRequestLogItem): void {
    this._httpRequests.value.push(request)
  }

  public static message(message: string): void {
    console.info(`🤧 ${message}`)
    this._messages.value.push(message)
  }

  public static get messages(): Array<string> {
    return this._messages.value
  }

  public static get httpRequests(): Array<IHttpRequestLogItem> {
    return this._httpRequests.value
  }
}
