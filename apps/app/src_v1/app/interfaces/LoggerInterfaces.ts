export interface IHttpRequestLogItem {
  type: 'action' | 'service' | 'api'
  path: string|null
  data?: object|Array<any>
  response: object
  error?: object
}

