<script setup lang="ts">
import ProfileService from '~/app/services/ProfileService'
import StockIndexService from '~/apps/stocks/services/StockIndexService'
import { ProfileType } from '~/types/ProfileTypes'

const router = useRoute()
const { username } = router.params
const service = new ProfileService()
const profile = await service.get<ProfileType>(`${username}`)
const stockIndexes = await (new StockIndexService()).getByProfile(profile.id)
const activeStockIndex = ref('')

onMounted(() => {
  activeStockIndex.value = window.location.hash?.replace('#', '')
})

</script>

<template>
  <div class="dash">
    <ProfileHeader active="overview" />
    <div class="page__inner">
      <div class="page__container">
        <van-tabs v-model:active="activeStockIndex">
          <van-tab v-for="item in stockIndexes" :key="item.id" :title="item.name">
            <StocksIndexView :hide-profile="true" :namespace="item.namespace" />
          </van-tab>
        </van-tabs>
      </div>
    </div>
  </div>
</template>
