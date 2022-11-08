import Http from "./Http";
import Entity from "../entities/Entity";


export default abstract class Resource<T, TCollection = Array<T>> extends Http {
  protected abstract resourceBasePath: string

  public fetch(): Promise<TCollection> {
    return this._get<TCollection>()
  }

  public get(id: string|number): Promise<T> {
    return this._get<T>(id)
  }

  public create(data: object): Promise<T> {
    return this._post<T>(undefined, data)
  }

  public update(id: string|number, data: object): Promise<boolean> {
    return this._put<boolean>(id, data)
  }

  public delete(id: string|number): Promise<boolean> {
    return this._delete<boolean>(id)
  }

  public search(term: string): Promise<TCollection> {
    return this._get<TCollection>(`search/${term}`)
  }

}
