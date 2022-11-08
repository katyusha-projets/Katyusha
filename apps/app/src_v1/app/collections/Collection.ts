export default abstract class Collection<T> {
  constructor(public items: Array<T>) {}

  protected groupBy(key: string): Record<string, Array<T>> {
    const groups: Record<string, Array<T>> = {}

    this.items.forEach((item: T|Record<string, any>) => {
      // @ts-ignore
      const keyValue: string = item[key]
      if(typeof groups[keyValue] === 'undefined') groups[keyValue] = []
      // @ts-ignore
      groups[keyValue].push(item)
    })

    return groups
  }
}
