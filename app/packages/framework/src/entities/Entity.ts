export default class Entity<T> {
  public constructor(protected _entity: T) {}

  public get entity(): T {
    return this._entity
  }
}
