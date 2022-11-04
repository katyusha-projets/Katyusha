<script lang="ts" setup>
import { Component } from 'vue'

type PageHeaderProps = {
  title: string
  subtitle?: string
  icon?: Component
}
const props = defineProps<PageHeaderProps>()

const goBack = () => {
  console.log('go back')
}
</script>

<template>
  <el-page-header :icon="icon" :content="props.title" :title="props.subtitle" @back="goBack" />
</template>
