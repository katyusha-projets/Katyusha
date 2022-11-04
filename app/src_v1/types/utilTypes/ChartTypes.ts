export type ChartTypes = 'bar' | 'candlestick' | 'line'

export type ChartSeriesType = Array<{
  name: string
  type?: string
  data: Array<number>
}>

export type XAxisType = Record<string, Array<number>> | Record<string, string>

export interface ChartOptionsType {
  chart: {
    type: ChartTypes
    height?: number
  }
  tooltip?: {
    shared: boolean
    custom: Array<Function>
  }
  series: ChartSeriesType
  xaxis: XAxisType
  stroke?: {
    width: Array<number>
  }
}
