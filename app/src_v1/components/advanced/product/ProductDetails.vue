<script setup lang="ts">

import { ProductType } from '~/types'

interface ProductDetailsProps {
  product: ProductType
}
const props = defineProps<ProductDetailsProps>()
</script>

<template>
  <div class="nft-details-wrapper">
    <div class="nft-details-inner">
      <div class="product-image">
        <img :src="props.product.image" :alt="props.product.name" />
      </div>
      <div class="nft-info">
        <div class="nft-info-head">
          <Title tag="h2" :size="4" weight="bold" narrow>
            <span>{{ props.product.name }}</span>
          </Title>
        </div>
        <div class="nft-info-price">
          <span class="eth-price text-gradient">
            {{ props.product.price }} ETH
          </span>
          <span class="paragraph px-1">·</span>
          <span class="dollar-price">
            ($123)
          </span>
          <span class="paragraph px-1">·</span>
          <span class="collection-rank">
            1 of 3
          </span>
        </div>
        <div class="nft-info-description">
          <p class="paragraph rem-95">{{ props.product.description }}</p>
        </div>
        <div class="nft-info-links">
          <RouterLink to="/" class="nft-info-link">
            <span>Creator</span>
            <div class="nft-info-link-inner">
              <span>Katyusha</span>
            </div>
          </RouterLink>
          <RouterLink to="/" class="nft-info-link">
            <span>Collection</span>
          </RouterLink>
        </div>
        <div class="nft-info-tabs">
          <div class="nft-info-tabs-inner">
          </div>
        </div>
      </div>
    </div>
    <div class="product-card-add">
      <AddProductToCart :namespace="product.namespace" />
    </div>
  </div>
</template>

<style scoped lang="scss">
.product-card-add {
  position: fixed;
  bottom: 4.5rem;
  left: 1rem;
  right: 1rem;
  z-index: 100000;
}

.product-image {
  padding: 0.3rem;
  overflow: hidden;

  img {
    border-radius: 10px;
  }
}

.nft-action {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  backdrop-filter: blur(4px);
  background: rgba(255, 255, 255, 0.94);

  .buttons {
    padding: 1rem;
    justify-content: space-between;

    .button {
      flex-basis: 49%;
      margin:0 !important;
    }
  }
}

.nft-preview-holder {
  position: sticky;
  top: 110px;

  img {
    display: block;
    width: 100%;
    border-radius: 0.85rem;
  }
}

.nft-info {
  padding-top: 1.5rem;
  box-shadow: none !important;

  .nft-info-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1.75rem;

    .action {
      display: inline-flex;
      justify-content: center;
      align-items: center;
      padding: 0;
      background: var(--wrap-bg-color);
      border: 1px solid var(--wrap-border-color);
      height: 36px;
      width: 36px;
      border-radius: 50%;
      margin-left: 0.5rem;
      color: var(--primary);
      cursor: pointer;
      transition: box-shadow 0.3s;

      &:hover {
        box-shadow: var(--spread-shadow);
      }
    }
  }

  .nft-info-price {
    padding: 1rem 1.75rem;
    font-family: var(--font);

    .eth-price {
      font-size: 1.1rem;
      font-weight: 600;
    }

    .dollar-price,
    .collection-rank {
      font-size: 0.9rem;
      color: var(--light-text);
    }
  }

  .nft-info-description {
    padding: 0 1.75rem;
  }

  .nft-info-links {
    display: flex;
    align-items: center;
    padding: 2rem 1.75rem;

    .nft-info-link {
      flex: 1 1 0;

      > span {
        font-family: var(--font);
        font-size: 0.85rem;
        color: var(--light-text);
      }

      .nft-info-link-inner {
        display: flex;
        align-items: center;

        > span {
          color: var(--title-color);
          font-weight: 500;
          font-size: 0.9rem;
          font-family: var(--font);
          margin-left: 0.5rem;
        }
      }
    }
  }

  .nft-info-tabs {
    padding: 0 1.75rem 1.75rem;

    .nft-info-tabs-inner {
      background: var(--wrap-muted-color);
      border-radius: 0.85rem;
      padding: 1rem;

      :deep(.tabs) {
        font-size: 0.9rem;
      }

      .active-bids {
        .active-bid {
          display: flex;
          align-items: center;

          .meta {
            margin-left: 0.5rem;

            span {
              display: block;
              font-family: var(--font);

              &:first-child {
                font-size: 0.9rem;
                color: var(--title-color);
                font-weight: 500;
              }

              &:nth-child(2) {
                font-size: 0.8rem;
                color: var(--light-text);
              }
            }
          }

          &:not(:last-child) {
            margin-bottom: 0.75rem;
          }
        }
      }

      .current-bid {
        display: flex;
        background: var(--card-bg-color);
        border-radius: 0.75rem;
        margin-top: 1.5rem;
        font-family: var(--font);
        box-shadow: var(--light-box-shadow);

        .small-label {
          font-size: 0.85rem;
          color: var(--light-text);
        }

        .highest-bid {
          flex: 1 1 0;
          border-right: 1px solid var(--card-border-color);
          padding: 1rem;
          font-family: var(--font);

          .highest-bid-value {
            display: block;

            .highest-bid-eth,
            .highest-bid-dollar {
              display: block;
            }

            .highest-bid-eth {
              font-weight: 700;
              font-size: 1.25rem;
            }

            .highest-bid-dollar {
              color: var(--medium-text);
              font-size: 0.9rem;
            }
          }
        }

        .bid-countdown {
          flex: 1 1 0;
          padding: 1rem;

          .auction-timer {
            display: flex;

            .timer-block {
              text-align: center;

              span {
                display: block;
                font-family: var(--font);

                &:first-child {
                  font-size: 1.1rem;
                  font-weight: 500;
                  color: var(--title-color);
                }

                &:nth-child(2) {
                  font-size: 0.7rem;
                  color: var(--light-text);
                }
              }

              &:not(.is-separator) {
                flex: 1 1 0;
              }
            }
          }
        }
      }
    }
  }

  .nft-info-action {
    padding: 0 1.75rem 1.75rem;

    :deep(.button) {
      flex: 1 1 0;
    }
  }

  &:hover {
    box-shadow: var(--spread-shadow);
  }
}

@media (max-width: 767px) {
  .nft-info {
    .nft-info-head {
      flex-direction: column-reverse;
      align-items: flex-start;
      padding: 1.25rem 1.25rem 0;

      .actions {
        margin-left: auto;
      }

      .action {
        margin: 0 0.25rem 0.75rem;
      }
    }

    .nft-info-price,
    .nft-info-description,
    .nft-info-links,
    .nft-info-tabs,
    .nft-info-action {
      padding-left: 1.25rem;
      padding-right: 1.25rem;
    }

    .nft-info-tabs {
      .nft-info-tabs-inner .current-bid {
        flex-direction: column;

        .highest-bid {
          border-right: none;
          border-bottom: 1px solid var(--card-border-color);
        }
      }
    }
  }
}

@media only screen and (min-width: 768px) and (max-width: 1024px) and (orientation: portrait) {
  .nft-info {
    width: 100%;
    max-width: 100%;
    margin: 0;
  }

  .nft-preview-holder {
    img {
      width: 100%;
    }
  }
}
</style>
