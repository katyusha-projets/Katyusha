<script setup lang="ts">
const id = 'id_' + (Math.random() + 1).toString(36).substring(7)
import ApexCharts from 'apexcharts'


const options = {
  series: [
    {
      name: 'Desktops',
      data: [
        {
          x: 'ABC',
          y: 10
        },
        {
          x: 'DEF',
          y: 60
        },
        {
          x: 'XYZ',
          y: 41
        }
      ]
    },
    {
      name: 'Mobile',
      data: [
        {
          x: 'ABCD',
          y: 10
        },
        {
          x: 'DEFG',
          y: 20
        },
        {
          x: 'WXYZ',
          y: 51
        },
        {
          x: 'PQR',
          y: 30
        },
        {
          x: 'MNO',
          y: 20
        },
        {
          x: 'CDE',
          y: 30
        }
      ]
    }
  ],
  legend: {
    show: false
  },
  chart: {
    height: 350,
    type: 'treemap'
  },
  title: {
    text: 'Multi-dimensional Treemap',
    align: 'center'
  }
};

onMounted(() => {
  const chart = new ApexCharts(document.getElementById(`${id}`), options);
  chart.render()
})
</script>

<template>
  <div :id="id"></div>
</template>
