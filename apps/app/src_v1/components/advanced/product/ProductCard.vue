<script setup lang="ts">
import { ProductType } from '~/types'
import AddToFavoritesAction from '~/app/actions/catalog/AddToFavoritesAction'

interface ProductCardProps {
  product: ProductType
  flat?: boolean
}

const props = withDefaults(defineProps<ProductCardProps>(), {
  flat: false
})

const cardClasses = computed(() => [props.flat && 'is-flat'])
const emits = ['product-click']
</script>

<template>
  <div class="card p-0">
    <div class="card-image cursor-pointer" :style="`background-image: url('${product.image}')`" @click="$emit('product-click', product.namespace)">
      <div class="price">{{ product.price }}</div>
    </div>
    <div class="card-content">
      <div class="cursor-pointer" @click="$emit('product-click', product.namespace)">
        <div class="media is-align-items-center">
          <div class="media-content">
            <p class="rem-75 weight-5 text-primary subtitle is-6 is-semi is-uppercase">
              <span>{{ product.category.name }}</span>
            </p>
            <h3 class="title is-6 is-semi" data-v-44ce7835="">
              <span>{{ product.name }}</span>
            </h3>
          </div>
        </div>
        <div class="content">
          <p class="paragraph">{{ product.description }}</p>
        </div>
      </div>
      <div class="is-flex is-align-items-center is-justify-content-space-between mt-4">
        <AddProductToCart :namespace="product.namespace" />
        <div class="w-1/12"></div>
        <Button @click="() => AddToFavoritesAction.run(product.id)"><i class="fa fa-solid fa-heart"></i></Button>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
.nft-details-wrapper {
  padding-bottom: 5rem;
}

.modal {

  .card {
    box-shadow: none !important;
    border: none !important;
  }
}

.card {
  background: var(--card-bg-color);
  border: 1px solid var(--card-border-color);
  border-radius: 1.25rem;
  padding: 0.75rem;
  box-shadow: var(--spread-shadow);
  text-align: left;
  overflow: hidden;
  transition: box-shadow 0.3s;
  position: relative;

  .price {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    background: #FFF;
    padding: 0 1rem;
    border-radius: 100px;
    color: #000;
    bottom: -15px;
    font-size: 1.2rem;
  }

  &.horizontal {
    display:flex;
    justify-content: space-between;
    flex-direction: row;
    flex-wrap: nowrap;
    border-radius: 0.4rem;
    margin-bottom: 0.8rem;

    .price {
      bottom: 0.7rem;
    }

    .card-image, .card-content {
    }

    .media {
      margin-bottom: 0.3rem;

      .media-content {
        display:flex;
        justify-content: space-between;
        flex-direction: row-reverse;
        overflow: hidden !important;

        > * {
          margin:0;
        }
      }
    }

    .card-image {
      width: 130px;
      height: 130px;

      @media (max-width: 720px) {
        width: 110px;
        height: 167px;
      }
    }

    .card-content {
      padding: 1rem;
      width: calc(100% - 130px);

      @media (max-width: 720px) {
        width: calc(100% - 110px);
      }

      .paragraph {
        height:48px;
      }
    }
  }

  .paragraph {
    font-size: 0.9rem;
    line-height: 1.5rem;
    height: 91px;
    text-overflow: ellipsis;
    overflow: hidden;
  }

  .subtitle {
    margin-bottom: 1.8rem;
  }

  .card-image {
    position: relative;
    height:320px;
    background-size: cover;
    width:100%;

    > img {
      display: block;
      border-radius: 1rem;
      margin-bottom: 0.75rem;
    }

    .likes {
      position: absolute;
      top: 0.5rem;
      left: 0.5rem;
      display: flex;
      align-items: center;
      padding: 0.25rem 0.5rem;
      border-radius: 10rem;
      background: var(--wrap-bg-color);

      svg {
        vertical-align: middle;
        margin-right: 0.25rem;
      }

      span {
        font-size: 0.75rem;
        font-family: var(--font-alt);
        font-weight: 600;
        color: var(--title-color);
      }
    }

    .details {
      position: absolute;
      top: 0.5rem;
      right: 0.5rem;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 26px;
      width: 26px;
      border-radius: 50%;
      background: var(--wrap-bg-color);
      color: var(--light-text);
      opacity: 0;
      transform: translateY(5px);
      pointer-events: none;
      transition: transform 0.3s, opacity 0.3s;

      svg {
        vertical-align: middle;
      }
    }

    .auction-timer {
      position: absolute;
      bottom: 1rem;
      left: 0;
      right: 0;
      width: 100%;
      max-width: 160px;
      height: 36px;
      margin: 0 auto;

      .timer-inner {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        padding: 0 1rem;

        .inner-bg {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: var(--dark-bg);
          border-radius: 0.85rem;
          opacity: 0.4;
          transition: opacity 0.3s;
        }
      }

      .timer-block {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 36px;
        font-family: var(--font);
        font-size: 0.8rem;
        font-weight: 500;
        color: var(--white-smoke);
        padding: 0 0.25rem;

        &.is-separator {
          padding: 0;
        }
      }
    }
  }

  .card-head {
    display: flex;
    align-items: center;
    padding: 0 0.25rem;

    :deep(.title) {
      line-height: 1;
      transition: opacity 0.3s;
    }

    :deep(.avatar) {
      margin-right: 0.5rem;
    }

    a {
      &:hover {
        :deep(.title) {
          opacity: 0.9;
        }
      }
    }
  }

  .card-foot {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 0.25rem 0.5rem;

    .bid {
      position: relative;

      span {
        display: block;
        font-family: var(--font-alt);
      }

      .bid-label {
        font-size: 0.65rem;
        font-weight: 600;
        text-transform: uppercase;
        color: var(--light-text);
      }

      .bid-value {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--title-color);
      }

      .bid-action {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        opacity: 0;
        transform: translateY(60px);
        transition: transform 0.3s, opacity 0.2s;

        :deep(.button) {
          min-height: 38px;
          font-size: 0.9rem;
        }
      }
    }
  }

  &:hover {
    .card-image {
      .auction-timer {
        .timer-inner {
          .inner-bg {
            opacity: 0.6;
          }
        }
      }

      .details {
        pointer-events: all;
        opacity: 1;
        transform: translateY(0);
      }
    }

    .card-foot {
      .bid {
        .bid-action {
          transform: translateY(0);
          opacity: 1;
        }
      }
    }
  }

  &.is-flat {
    box-shadow: none;

    &:hover {
      box-shadow: var(--spread-shadow);
    }
  }
}
</style>
