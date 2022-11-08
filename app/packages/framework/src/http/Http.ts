import axios from 'axios'
axios.defaults.withCredentials = true
axios.defaults.headers.common['Domain'] = window.location.host

export default abstract class Http {
  protected path(path: string|number|null): string {
    return `${apiConfig.url()}/${path}`
  }

  protected async _get<T>(path: string|number|null = null, params: any|undefined = null): Promise<T> {
    path = this.path(path)
    const request = await axios.get(`${path}${params ? '?' + new URLSearchParams(params).toString() : ''}`)
   return request.data
  }

  protected async _post<T>(path: string|number|null = null, data: object|Array<object> = []): Promise<T> {
    path = this.path(path)
    const request = await axios.post(path, data)
    return request.data
  }

  protected async _put<T>(id: string|number, data: object|Array<object>): Promise<T> {
    const path = `${apiConfig.url()}/service/${this.resource}/${id}`
    const request = await axios.put(path, data)
    return request.data
  }

  protected async _delete<T>(id: string|number): Promise<T> {
    const path = `${apiConfig.url()}/service/${this.resource}/${id}`
    const request = await axios.delete(path)
    return request.data
  }
}
