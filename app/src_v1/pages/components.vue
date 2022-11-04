<script async setup lang="ts">
import { statsDemoProps } from '~/app/config/demoComponents'
</script>

<template>
  <main>
    <section class="container">
      <h1>Stats</h1>
      <Stats v-bind="statsDemoProps" />
      <Separator />
      <h1>Cards</h1>
      <Card />
      <Separator />
      <h1>List</h1>
      <List />
      <Separator />
      <h1>Data Grid</h1>
      <DataGrid />
      <Separator />
      <h1>Status</h1>
      <div class="flex justify-between">
        <Status title="Status" :dot="true" color="azure" />
        <Status :dot="true" color="azure" />
      </div>
    </section>
  </main>
</template>
