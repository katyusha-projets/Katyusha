<script setup lang="ts">
const id = 'id_' + (Math.random() + 1).toString(36).substring(7)
import ApexCharts from 'apexcharts'

const options = {
  series: [44, 55, 13, 43, 22],
  chart: {
    width: 380,
    type: 'pie',
  },
  labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
      },
      legend: {
        position: 'bottom'
      }
    }
  }]
};

onMounted(() => {
  const chart = new ApexCharts(document.getElementById(`${id}`), options);
  chart.render()
})
</script>

<template>
  <div :id="id"></div>
</template>
