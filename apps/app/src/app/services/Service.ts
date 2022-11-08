import axios from 'axios'
import apiConfig from '~/app/config/apiConfig'
axios.defaults.withCredentials = true
axios.defaults.headers.common['Domain'] = window.location.host

export default abstract class Service<R> {
  protected abstract resource: string

  /**
   * |------------------|
   * | REST METHODS
   * |------------------|
   * (\__/) ||
   * (•ㅅ•) ||
   * / 　 づ */

  public fetch<R>(): Promise<Array<R>> {
    return this._get<R>()
  }

  public get<R>(id: string|number): Promise<R> {
    return this._get<R>(id)
  }

  public create<R>(data: object): Promise<R> {
    return this._post<R>(undefined, data)
  }

  public update(id: string|number, data: object): Promise<boolean> {
    return this._put<boolean>(id, data)
  }

  public delete(id: string|number): Promise<boolean> {
    return this._delete<boolean>(id)
  }

  public search<R>(term: string): Promise<Array<R>> {
    return this._get(`search/${term}`)
  }

  /**
   * |------------------|
   * | BASIC METHODS
   * |------------------|
   * (\__/) ||
   * (•ㅅ•) ||
   * / 　 づ */

  protected path(path: string|number|null): string {
    return `${apiConfig.url()}/service/${this.resource}/${path ?? ''}`
  }

  protected async _get<R>(path: string|number|null = null, params: any|undefined = null): Promise<any> {
    path = this.path(path)
    const request = await axios.get(`${path}${params ? '?' + new URLSearchParams(params).toString() : ''}`)
    const response = request.data
    return response
  }

  protected async _post<R>(path: string|number|null = null, data: object|Array<object> = []): Promise<R> {
    path = this.path(path)
    const request = await axios.post(path, data)
    const response = request.data
    return response
  }

  protected async _put<R>(id: string|number, data: object|Array<object>): Promise<R> {
    const path = `${apiConfig.url()}/service/${this.resource}/${id}`
    const request = await axios.put(path, data)
    const response = request.data
    return response
  }

  protected async _delete<R>(id: string|number): Promise<R> {
    const path = `${apiConfig.url()}/service/${this.resource}/${id}`
    const request = await axios.delete(path)
    const response = request.data
    return response
  }
}
