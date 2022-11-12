<script setup async lang="ts">
import {useSessionStore} from "~/store/session";

const activeTab = ref<string>('')
const sessionStore = useSessionStore()
</script>

<template>
  <div>
  </div>
  <div v-if="sessionStore.user">
    <van-tabs v-model:active="activeTab" sticky>
      <van-tab v-for="portfolio in sessionStore.user.portfolios" :title="portfolio.name">
        content {{ index }}
      </van-tab>
    </van-tabs>
  </div>
</template>
 
