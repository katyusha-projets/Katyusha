import Http from "./Http";


export default abstract class Actions extends Http {
  protected abstract actionsBasePath: string

  protected sendAsGet<T>(): Promise<T> {
    return this._get<T>()
  }

  protected sendAsPost<T>(): Promise<T> {
    return this._get<T>()
  }
}
