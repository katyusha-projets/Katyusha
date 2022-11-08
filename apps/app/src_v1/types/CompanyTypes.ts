import { FinancialRecordType, TickerRecordType } from '~/types/RecordTypes'

export type CompanyType = {
  id: string
  name: string
  description: string
  market_cap: number
  exchange: string
  country: string
  currency: string
  sector: string
  industry: string
  ticker: string
  logo: string
  ceo: string
  short_name: string
  website: string
  tag_1: string
  tag_2: string
  tag_3: string
  records: Array<TickerRecordType>
  financial_records: Array<FinancialRecordType>
  parsed: {
    financial_records: {
      yearlyRecords: Record<string, FinancialRecordType>
      quarterlyRecords: Record<string, FinancialRecordType>
    }
    records: Record<string, TickerRecordType>
  }
}
