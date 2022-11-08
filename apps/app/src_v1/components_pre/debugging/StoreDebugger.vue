<script lang="ts" setup>
const user = useUserStore()

</script>

<template>
  <section>
    <label>Session<div>{{ user.session }}</div></label>
  </section>
</template>
