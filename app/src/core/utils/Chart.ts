import { ChartOptionsType, ChartTypes } from '~/types/utilTypes/ChartTypes'
import ApexCharts from 'apexcharts'

export default class Chart {
  protected options: ChartOptionsType
  protected selector: HTMLElement
  protected chart?: ApexCharts

  constructor(selectorId: string, protected type: ChartTypes) {
    const selector = document.getElementById(selectorId)
    if(!selector) throw new Error(`Element #${selectorId} not found`)
    this.selector = selector
    this.options = {
      series: [],
      xaxis: {},
      chart: {
        type
      }
    }
  }

  public addSeries(name: string, data: Array<any>, type?: string): this {
    if(typeof type === 'undefined') type = this.type
    this.options.series.push({ name, data, type })
    return this
  }

  public setHeight(height: number): this {
    this.options.chart.height = height
    return this
  }

  public setXAxis(key: string, data: Array<number|string>): this {
    // @ts-ignore
    this.options.xaxis[key] = data
    return this
  }

  public setStroke(width: Array<number>): this {
    this.options.stroke = { width }
    return this
  }

  public setTooltip(callback: Function, shared: boolean = true): this {
    this.options.tooltip = { shared, custom: [callback] }
    return this
  }

  public setXAxisType(type: string): this {
    this.options.xaxis.type = type
    return this
  }

  public async render(): Promise<void> {
    this.chart = new ApexCharts(this.selector, this.options)
    await this.chart.render()
  }
}
