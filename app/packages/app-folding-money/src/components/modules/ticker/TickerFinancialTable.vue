<script lang="ts" setup>
import {ITicker} from "~/app/interfaces/TickerInterfaces";
import NumberUtils from "~/app/utils/NumberUtils";
const props = defineProps<{ticker: ITicker}>()

const dataObjects = [
  'balanceSheetStatement',
  'balanceSheetStatementGrowth',
  'enterpriseValues',
  'incomeStatementGrowth',
  'keyMetrics',
  'financialGrowth',
]

const skipCols = ['year', 'month', 'monthYear', 'symbol', 'date', 'link', 'finalLink', 'cik', 'fillingDate', 'calendarYear', 'acceptedDate', 'period']

const camelToWords = (text: string): string => {
  const result = text.replace(/([A-Z])/g, " $1");
  return result.charAt(0).toUpperCase() + result.slice(1);
}

const activeTab = ref<string>('')
const data = props.ticker.financialData.byYear
const years = Object.keys(data)
let cols: Record<string, Array<string>> = {}

dataObjects.forEach((key: string) => {
  years.forEach((year: any) => {
    // @ts-ignore
    if(typeof data[year][key] !== 'undefined')
      // @ts-ignore
    cols[key] = Object.keys(data[year][key])
  })
})

const parseVal = (val: any) => {
  if(`${val}`.includes('0.')) return Math.round(val * 100) / 100
  if(!isNaN(val)) return NumberUtils.summariseNumber(val)
  return val
}

</script>

<template>
  <van-tabs v-model:active="activeTab">
    <van-tab :title="camelToWords(objectKey)" :key="objectKey" v-for="objectKey in dataObjects">
        <div class="table_cnt p-4">
          <table>
            <thead>
            <tr>
              <th class="title"></th>
              <th v-for="i in Object.keys(data)" :key="i">{{i}}</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="col in cols[objectKey]"  :key="`${objectKey}-${col}`">
              <tr v-if="!skipCols.includes(col)">
                <th class="title">{{(camelToWords(col))}}</th>
                <td v-for="y in years" :key="y">{{typeof data[y][objectKey] === 'undefined' || typeof data[y][objectKey][col] === 'undefined' ? '' : parseVal(data[y][objectKey][col])}}</td>
              </tr>
            </template>
            </tbody>
          </table>
        </div>
    </van-tab>
  </van-tabs>

</template>


<style lang="scss" scoped>
.table_cnt {
  overflow: hidden;
  overflow-x: scroll;
  position: relative;
}

table {
  max-width: 100%;
  position: relative;

  thead {
    text-align: right;
  }

  tr:hover {
    background-color: rgba(108, 93, 211, 0.1);
  }

  td:hover::after,
  th:hover::after {
    content: "";
    position: absolute;
    background-color: rgba(108, 93, 211, 0.1);
    left: 0;
    top: -5000px;
    height: 10000px;
    width: 100%;
    z-index: -1;
  }

  th {
    position: sticky;
    top: 0;
  }

  td, th {
    position: relative;
  }

  tr {
    border-bottom: 1px solid #eee;

    &:last-child {
      border-bottom: none;
    }

    tr, td {
      padding: 0.5rem .75rem 0.5rem 0;
    }

    th {
      padding-left: .5rem;
    }

    td {
      text-align: right;
      font-size: 12px;
    }
  }

  .title {
    width: 270px;
    display: block;
    font-weight: normal;
    font-size: 13px;
    text-align: left;
  }
}
</style>
