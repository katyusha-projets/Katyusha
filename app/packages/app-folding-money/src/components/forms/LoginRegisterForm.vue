<script lang="ts" setup>

import LoginRegisterAction from '~/app/actions/customers/LoginRegisterAction'
import { LoginRegisterDTO } from '~/app/DTOs/LoginRegisterDTO'

const mobileNumber = ref<number|null>(null)
const loginCode = ref<number|null>(null)
const activeName = ref<string>('login')

const login = async () => {
  // @ts-ignore
  const dto: LoginRegisterDTO = { mobileNumber: mobileNumber.value, loginCode: loginCode.value }
  await LoginRegisterAction.run(dto)
}
</script>

<template>
  <van-tabs v-model:active="activeName">
    <van-tab title="Login" name="login">
      <div class="p-8">

        <n-input v-model:value="mobileNumber" type="text" placeholder="Mobile number" />
        <n-input v-model:value="loginCode" type="number" placeholder="Login code" />

        <Button color="primary" class="w-full" raised bold @click="login">Login</Button>
      </div>
    </van-tab>
    <van-tab title="Register" name="register">
      <div class="p-8">
        <n-input v-model:value="mobileNumber" type="text" placeholder="Mobile number" />
        <n-input v-model:value="loginCode" type="number" placeholder="Login code" />

        <Button color="primary" class="w-full" raised bold @click="login">Register</Button>
      </div>
    </van-tab>
  </van-tabs>
</template>
