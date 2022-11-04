export default class NumberUtils {

  public static usd(amount: number): string {

    if(amount > 100000) {
      return '$' + this.summariseNumber(amount)
    }

    const formatter = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' })
    return formatter.format(amount)
  }

  public static summariseNumber(value: number): string {
    const suffixes = ['', 'K', 'M', 'B', 'T']
    const suffixNum = Math.floor((''+value).length/3)
    let shortValue = parseFloat((suffixNum !== 0 ? (value / Math.pow(1000, suffixNum)) : value).toPrecision(2))
    if (shortValue % 1 !== 0) {
      // @ts-ignore
      shortValue = shortValue.toFixed(1)
    }
    return shortValue+suffixes[suffixNum]
  }
}
