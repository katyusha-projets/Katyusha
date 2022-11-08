import { BalanceSheetsType, HistoricalPriceType, IncomeStatementType, StockType } from '~/types/StockTypes'
import Chart from '~/core/utils/Chart'

type StockPriceType = 'open' | 'high' | 'low' | 'close'

export default class StockEntity {
  constructor(protected entity: StockType) {}

  public getStockPrice(type: StockPriceType): {data: Array<number>, dates: Array<number|string>} {
    const data: Array<number> = []
    const dates: Array<number|string> = []

    this.entity.historical_prices?.forEach((price: HistoricalPriceType) => {
      if(dates.length > 20) return false
      dates.push(price.date)
      data.push(price[type])
    })

    return { data, dates }
  }

  public getRecentStockPrice(offset: number = 1): HistoricalPriceType {
    return this.entity.historical_prices[this.entity.historical_prices.length - offset]
  }

  public getRecentBalanceSheet(offset: number = 1): BalanceSheetsType {
    return this.entity.balance_sheets[this.entity.balance_sheets.length - offset]
  }

  public getRecentIncomeStatement(offset: number = 1): IncomeStatementType {
    return this.entity.income_statements[this.entity.income_statements.length - offset]
  }

  public tickerPriceChart(selectorId: string): Chart {
    const chart = new Chart(selectorId, 'line')
    chart.setXAxisType('datetime')
    chart.setStroke([3, 1])
    chart.setHeight(500)

    const lineData: Array<{x: Date, y: number}> = []
    const candleData: Array<{x: Date, y: Array<number>}> = []

    this.entity.historical_prices.forEach((price: HistoricalPriceType) => {
      const date = new Date(price.date)
      lineData.push({ x: date, y: price.close })
      candleData.push({ x: date, y: [price.open, price.close] })
    })

    chart.addSeries('line', lineData, 'line')
    chart.addSeries('candlestick', candleData, 'candlestick')

    chart.setTooltip(function(i: any) {
      return i.w.globals.series[i.seriesIndex][i.dataPointIndex]
    })

    return chart
  }

}
