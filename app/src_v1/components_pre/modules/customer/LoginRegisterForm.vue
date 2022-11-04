<script lang="ts" setup>
import { useUserStore } from '~/store/user'

const mobileNumber = ref<number|null>(null)
const loginKey = ref<number|null>(null)
const userStore = useUserStore()

</script>

<template>
  <div>
    <Modal :show="userStore.showLoginRegisterForm">
      <van-cell-group inset>
        <van-field v-model="mobileNumber" label="Mobile number" placeholder="Mobile number" />
        <van-field v-model="loginKey" type="number" label="Login key" placeholder="0000" />
      </van-cell-group>
    </Modal>
  </div>
</template>
