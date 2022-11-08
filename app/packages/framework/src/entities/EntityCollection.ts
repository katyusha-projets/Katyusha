export default class EntityCollection<T> {
  public constructor(protected _entityItems: Array<T>) {}

  public get items(): Array<T> {
    return this._entityItems
  }
}
