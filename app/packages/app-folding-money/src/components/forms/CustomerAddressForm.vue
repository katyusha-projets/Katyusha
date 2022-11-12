<script>
import { ref } from 'vue'
import { Toast } from 'vant'

export default {
  setup() {
    const searchResult = ref([])

    const onSave = () => Toast('save')
    const onDelete = () => Toast('delete')
    const onChangeDetail = (val) => {
      if (val) {
        searchResult.value = [
          {
            name: 'Name1',
            address: 'Address'
          }
        ]
      } else {
        searchResult.value = []
      }
    }

    return {
      onSave,
      onDelete,
      searchResult,
      onChangeDetail
    }
  }
}
</script>

<template>
  <van-address-edit
    show-postal
    show-delete
    show-set-default
    show-search-result
    :search-result="searchResult"
    :area-columns-placeholder="['Choose', 'Choose', 'Choose']"
    @save="onSave"
    @delete="onDelete"
    @change-detail="onChangeDetail"
  />
</template>
