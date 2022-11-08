<script lang="ts" setup>
import { CompanyType } from '~/types/CompanyTypes'
import KeyValues from '~/components/common/KeyValues.vue'

type CompanyViewProps = {
  company: CompanyType
}

const props = defineProps<CompanyViewProps>()
const skipKeys = ['fiscalDateEnding', 'reportedCurrency', 'id', 'timeframe', 'company_id']
const yearlyFilter = ref('')

const parseNumber = (value: any) => {
  return Intl.NumberFormat('en-US', {
    notation: 'compact',
    maximumFractionDigits: 1
  }).format(value)
}

const records = {
  yearly: props.company.parsed.financial_records.yearlyRecords,
  quarterly: props.company.parsed.financial_records.quarterlyRecords,
  ticker: props.company.parsed.records
}

const recordKeys: Record<string, Array<Record<string, string>>> = { financial_records: [], ticker: [] }

Object.keys(props.company.financial_records[0]).forEach((key) => {
  if(skipKeys.includes(key)) return false
  recordKeys.financial_records.push({ key, title: key.split(/(?=[A-Z])/).join(' ') })
})

Object.keys(props.company.ticker[0]).forEach((key) => {
  if(skipKeys.includes(key)) return false
  recordKeys.ticker.push({ key, title: key.split(/(?=[A-Z])/).join(' ') })
})

const recordHeaders = {
  yearly: Object.keys(records.yearly),
  quarterly: Object.keys(records.quarterly),
  ticker: Object.keys(records.ticker)
}

const yearlyValues: any = {}
recordKeys.financial_records.forEach((record) => {
  yearlyValues[record.key] = {}

  let lastValue: null|number = null
  recordHeaders.yearly.forEach((year) => {

    // @ts-ignore
    const value: any = records.yearly[year][record.key]
    const formatted: string = parseNumber(value)
    const change = lastValue !== null ? value - lastValue : null
    yearlyValues[record.key][year] = { value: formatted, change, changeFormatted: parseNumber(change) }
    lastValue = value
  })
})

const close = {}
const volume = {}
Object.keys(records.ticker).forEach((date) => {
  // @ts-ignore
  close[date] = records.ticker[date].close
  // @ts-ignore
  volume[date] = records.ticker[date].volume
})

</script>

<template>
  <div class="pt-12">
    <el-page-header :icon="null">
      <template #content>
        <div class="flex items-center">
          <el-avatar :size="32" class="mr-3" :src="company.logo" />
          <span class="text-large font-600 mr-3"> {{ company.name }} </span>
          <span class="text-sm mr-2" style="color: var(--el-text-color-regular)">{{ company.ticker }}</span>
        </div>
      </template>
    </el-page-header>

    <p>{{ company.description }}</p>

    <KeyValues class="my-12" :key-values="company" :skip="['logo', 'description']" />

    <h1 class="mt-24">Stock information</h1>
    <el-tabs tab-position="left">
      <el-tab-pane label="Closing price"><area-chart :data="close"></area-chart></el-tab-pane>
      <el-tab-pane label="Volume"><area-chart :data="volume"></area-chart></el-tab-pane>
    </el-tabs>

    <h1 class="mt-24">Yearly reports</h1>
    <table>
      <thead>
        <th>
          <input v-model="yearlyFilter" type="search" placeholder="Filter" />
        </th>
        <th v-for="year in recordHeaders.yearly" :key="year">{{ year }}</th>
      </thead>
      <tbody>
        <tr v-for="record in recordKeys.financial_records" :key="record.key">
          <template v-if="!yearlyFilter || record.title.toLowerCase().includes(yearlyFilter.toLowerCase())">
            <td class="row-title">{{ record.title }}</td>
            <td v-for="year in recordHeaders.yearly" :key="year">
              <span class="table-value">${{ yearlyValues[record.key][year].value }}</span>
              <template v-if="yearlyValues[record.key][year].change">
                <div v-if="yearlyValues[record.key][year].change > 0" class="change higher">{{ yearlyValues[record.key][year].changeFormatted }}</div>
                <div v-else class="change lower">{{ yearlyValues[record.key][year].changeFormatted }}</div>
              </template>
            </td>
          </template>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style lang="scss" scoped>
.table-value {
  display:inline-block;
  width:50px;
}

h1 {
  font-size: 2rem;
  margin-bottom: 1rem;
}

input {
  font-weight: normal;
  width: 100%;
  height: 28px;
  line-height: 28px;
  border-color: #efefef;
  font-size: 12px;
  padding: 0 .5rem;
  border-radius: 5px;
}

.change {
  border-radius: 30px;
  text-align: center;
  font-size: 10px;
  display: inline-block;
  width: 39px;
  float: right;

  &.higher {
    border-color: var(--color-green);
    color: #00b601;
    background-color: #34e64d3d;
  }

  &.lower {
    border-color: var(--color-red);
    color: var(--color-red);
    background-color: #e6344654;
  }
}

table {
  width:100%;

  thead {

    th {
      text-align: center;
      padding-bottom: 1rem;
      font-size: 15px;
    }
  }

  tbody {

    tr {

      &:hover {
        background: #f5f5f5;
      }

      td {
        cursor: default;
        width: 85px;
        text-transform: capitalize;
        padding: 0.2rem 0.5rem;
        font-size: 13px;
        border-right: 1px solid #f5f5f8;

        &:last-of-type {
          border-right: none;
        }

        &.row-title {
          width:260px;
        }
      }
    }
  }
}
</style>
