<script setup lang="ts">
import { defineProps } from 'vue'
import { IProduct } from '~/interfaces/ProductInterfaces'
import AddToFavoritesAction from '~/app/actions/catalog/AddToFavoritesAction'

interface ProductCardProps {
  product: IProduct
}

const props = defineProps<ProductCardProps>()
const useModal = useModalStore()
const open = () => {
  useModal.openProduct(props.product?.namespace)
}
</script>

<template>
  <div class="product-card">
    <div class="image" :style="`background-image: url('${product.image}')`" @click="open">
      <div class="actions">
        <AddProductToCart v-if="false" :namespace="product.namespace" />
        <Button class="fav-btn" @click="() => AddToFavoritesAction.run(product.id)"><i class="fa fa-solid fa-heart"></i></Button>
      </div> 
      <div class="meta">
        <h3>{{ product.name }}</h3>
        <div class="price"><span>${{ product.price }}</span></div>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
.van-swipe-item {

  .product-card {
    padding: 0.1rem;
    width:100%;
  }
}

.product-card {
  position: relative;
  width: calc(50vw - 0.4rem);
  margin-bottom: 0.25rem;

  .image {
    $height:280px;
    height:$height;
    background-position: center;
    background-size: cover;
    width:100%;
    border-radius: 8px;
    position:relative;
  }

  .actions {
    position: absolute;
    display:flex;
    justify-content: flex-end;
    left:.25rem;
    right:.25rem;
    top:.25rem;
  }

  .fav-btn {
    width: 42px;
    height: 42px;
    line-height: 42px;
    border-radius: 100px;
    min-height: unset;
    background: #FFF;
    box-shadow: 0 0 11px -9px #000000a3;
  }

  .meta {
    left:.25rem;
    right:.25rem;
    bottom:.25rem;
    position: absolute;
    text-align: center;
    backdrop-filter: blur(1px);
    padding: 0.5rem 0;
    background: #00000021;
    border-radius: 4px;

    h3 {
      height: 15px;
      overflow: hidden;
      margin-bottom: 0.2rem;
      font-size: 0.8rem;
      color: #FFF;
    }

    h5 {
      height: 40px;
      overflow: hidden;
      font-size: 0.8rem;
      margin-bottom: 0.5rem;
    }
  }

  .price {
    span {
      color: #FFF;
      font-size: 0.8rem;
    }
  }

  footer {
    display:flex;
    justify-content: space-between;
  }
}
</style>
