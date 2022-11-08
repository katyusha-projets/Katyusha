<script setup lang="ts">
// import MarqueeText from 'vue-marquee-text-component'

import { ProductType } from '~/types'

interface HeroProductsProps {
  products: ProductType[]
}

const props = withDefaults(defineProps<HeroProductsProps>(), {
  products: () => []
})
</script>

<template>
  <div class="hero-people-marquee">
    <MarqueeText :repeat="10" :duration="40">
      <div class="hero-people-list">
        <div v-for="(product, index) in props.products" :key="index" class="hero-people-item">
          <div class="card">
            <div class="card-image" :style="`background-image: url('${product.image}')`">
            </div>
          </div>
        </div>
      </div>
    </MarqueeText>
  </div>
</template>

<style scoped lang="scss">
.card-image {
  position: relative;
  height: 150px;
  background-size: cover;
  width: 100%;
  border-radius: 18px 18px 0 0;
}

.hero-people-marquee {
  position: relative;
  top: -2rem;

  .hero-people-list {
    display: flex;

    .hero-people-item {
      background: var(--card-bg-color);
      border: 1px solid var(--card-border-color);
      border-radius: 1.25rem;
      overflow: hidden;
      min-width: 220px;
      margin: 0 0.5rem;
      transition: background-color 0.3s, border-color 0.3s;

      .card {
        padding: 0;
      }

      :deep(.avatar) {
        transform: scale(0.85);
        transition: transform 0.3s;
      }

      .bottom-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 0.75rem;

        .logo {
          display: block;
          max-width: 70px;
        }

        .rating {
          font-size: 0.8rem;

          .iconify {
            margin-right: 0.15rem;
            color: var(--yellow);
          }
        }
      }

      &:hover {
        :deep(.avatar) {
          transform: scale(1);
        }
      }
    }
  }
}

.is-dark {
  .hero-people-marquee {
    .hero-people-list {
      .hero-people-item {
        .bottom-row {
          .logo {
            filter: invert(1);
          }
        }
      }
    }
  }
}

@media only screen and (max-width: 767px) {
  .hero-people-marquee {
    top: -1rem;
  }
}

@media only screen and (min-width: 768px) and (max-width: 1024px) and (orientation: portrait) {
  .hero-people-marquee {
    top: -6rem;
  }
}
</style>
