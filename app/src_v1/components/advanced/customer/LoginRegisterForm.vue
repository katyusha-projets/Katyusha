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
        <Field>
          <FieldLabel label="Phone number">
          </FieldLabel>
          <Control icon="feather:smartphone">
            <VInput v-model="mobileNumber" />
          </Control>
        </Field>

        <Field>
          <FieldLabel label="PIN code">
          </FieldLabel>
          <Control icon="feather:lock">
            <VInput v-model="loginCode" type="number" />
          </Control>
        </Field>

        <Button color="primary" class="w-full" raised bold @click="login">Login</Button>
      </div>
    </van-tab>
    <van-tab title="Register" name="register">
      <div class="p-8">
        <Field>
          <FieldLabel label="Phone number">
          </FieldLabel>
          <Control icon="feather:smartphone">
            <VInput v-model="mobileNumber" />
          </Control>
        </Field>

        <Field>
          <FieldLabel label="PIN code">
          </FieldLabel>
          <Control icon="feather:lock">
            <VInput v-model="loginCode" type="number" />
          </Control>
        </Field>

        <Button color="primary" class="w-full" raised bold @click="login">Register</Button>
      </div>
    </van-tab>
  </van-tabs>
</template>
