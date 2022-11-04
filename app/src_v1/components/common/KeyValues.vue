<script lang="ts" setup>

type KeyValueProps = {
  keyValues: Record<string, any>
  skip?: Array<string>
}

const props = defineProps<KeyValueProps>()
const parsed: Record<string, string|number> = {}
Object.keys(props.keyValues).forEach((key: string) => {
  const value = props.keyValues[key]
  if(typeof value === 'string' || typeof value === 'number') {
    parsed[key] = value
  }
})

const keyToTitle = (key: string) => {
  return key.split(/(?=[A-Z])/).join(' ').split('_').join(' ')
}

const skipValues = ['id'].concat(props.skip ?? [])
</script>

<template>
  <div>
    <el-descriptions>
      <template v-for="key in Object.keys(parsed)" :key="key">
        <el-descriptions-item v-if="!skipValues.includes(key)" :label="keyToTitle(key)">{{ parsed[key] }}</el-descriptions-item>
      </template>
    </el-descriptions>
  </div>
</template>

<style lang="scss">
.el-descriptions__cell {

  .el-descriptions__label {
    margin-right: 15px;
    font-weight: bold;
    color: #000;
    text-transform: capitalize;
    font-size: 12px;
    display: block;
  }
}
</style>
