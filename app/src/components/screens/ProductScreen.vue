<script setup lang="ts">

import { ProductType } from '~/types'

interface ProductDetailsProps {
  product: ProductType
}

const props = defineProps<ProductDetailsProps>()
</script>

<template>
  <div class="w-full md:w-auto absolute left-1/2 transform -translate-x-1/2 shadow-xl h-auto max-h-full top-1/2 -translate-y-1/2 rounded-lg">
    <button aria-label="Close panel" class="fixed z-10 inline-flex items-center justify-center w-7 h-7 md:w-8 md:h-8 rounded-full bg-white shadow text-gray-600 transition duration-200 focus:outline-none focus:text-gray-800 focus:shadow-md hover:text-gray-800 hover:shadow-md -top-3.5 md:-top-4 -end-3.5 md:-end-4">
      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="text-xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
        <path d="M289.94 256l95-95A24 24 0 00351 127l-95 95-95-95a24 24 0 00-34 34l95 95-95 95a24 24 0 1034 34l95-95 95 95a24 24 0 0034-34z">
        </path>
      </svg>
    </button>
    <div class="overflow-y-auto h-full rounded-lg" style="max-height: calc(100vh - 120px);">
      <div class="rounded-lg bg-white">
        <div class="flex flex-col lg:flex-row w-full md:w-[650px] lg:w-[960px] mx-auto overflow-hidden">
          <div class="flex-shrink-0 flex items-center justify-center w-full lg:w-430px max-h-430px lg:max-h-full overflow-hidden bg-gray-300">
            <img :src="product.image" :alt="product.name" class="lg:object-cover lg:w-full lg:h-full">
          </div>
          <div class="flex flex-col p-5 md:p-8 w-full">
            <div class="pb-5">
              <div class="mb-2 md:mb-2.5 block -mt-1.5" role="button">
                <h2 class="text-heading text-lg md:text-xl lg:text-2xl font-semibold hover:text-black">{{ product.name }}</h2>
              </div>
              <p class="text-sm leading-6 md:text-body md:leading-7">{{ product.description }}</p>
              <div class="flex items-center mt-3">
                <div class="text-heading font-semibold text-base md:text-xl lg:text-2xl">{{ product.price }}</div>
              </div>
            </div>
            <div class="mb-4">
              <h3 class="text-base md:text-lg text-heading font-semibold mb-2.5 capitalize">size</h3>
              <ul class="colors flex flex-wrap -me-3">
                <li class="cursor-pointer rounded border border-gray-100 w-9 md:w-11 h-9 md:h-11 p-1 mb-2 md:mb-3 me-2 md:me-3 flex justify-center items-center text-heading text-xs md:text-sm uppercase font-semibold transition duration-200 ease-in-out hover:border-black">S</li>
                <li class="cursor-pointer rounded border border-gray-100 w-9 md:w-11 h-9 md:h-11 p-1 mb-2 md:mb-3 me-2 md:me-3 flex justify-center items-center text-heading text-xs md:text-sm uppercase font-semibold transition duration-200 ease-in-out hover:border-black">M</li>
                <li class="cursor-pointer rounded border border-gray-100 w-9 md:w-11 h-9 md:h-11 p-1 mb-2 md:mb-3 me-2 md:me-3 flex justify-center items-center text-heading text-xs md:text-sm uppercase font-semibold transition duration-200 ease-in-out hover:border-black">L</li>
                <li class="cursor-pointer rounded border border-gray-100 w-9 md:w-11 h-9 md:h-11 p-1 mb-2 md:mb-3 me-2 md:me-3 flex justify-center items-center text-heading text-xs md:text-sm uppercase font-semibold transition duration-200 ease-in-out hover:border-black">XL</li>
              </ul>
            </div>
            <div class="mb-4">
              <h3 class="text-base md:text-lg text-heading font-semibold mb-2.5 capitalize">color</h3>
              <ul class="colors flex flex-wrap -me-3">
                <li class="cursor-pointer rounded border border-gray-100 w-9 md:w-11 h-9 md:h-11 p-1 mb-2 md:mb-3 me-2 md:me-3 flex justify-center items-center text-heading text-xs md:text-sm uppercase font-semibold transition duration-200 ease-in-out hover:border-black">
                  <span class="h-full w-full rounded block" style="background-color: rgb(232, 108, 37);">
                  </span>
                </li>
                <li class="cursor-pointer rounded border border-gray-100 w-9 md:w-11 h-9 md:h-11 p-1 mb-2 md:mb-3 me-2 md:me-3 flex justify-center items-center text-heading text-xs md:text-sm uppercase font-semibold transition duration-200 ease-in-out hover:border-black">
                  <span class="h-full w-full rounded block" style="background-color: rgb(255, 165, 180);">
                  </span>
                </li>
                <li class="cursor-pointer rounded border border-gray-100 w-9 md:w-11 h-9 md:h-11 p-1 mb-2 md:mb-3 me-2 md:me-3 flex justify-center items-center text-heading text-xs md:text-sm uppercase font-semibold transition duration-200 ease-in-out hover:border-black">
                  <span class="h-full w-full rounded block" style="background-color: rgb(130, 36, 227);">
                  </span>
                </li>
                <li class="cursor-pointer rounded border border-gray-100 w-9 md:w-11 h-9 md:h-11 p-1 mb-2 md:mb-3 me-2 md:me-3 flex justify-center items-center text-heading text-xs md:text-sm uppercase font-semibold transition duration-200 ease-in-out hover:border-black">
                  <span class="h-full w-full rounded block" style="background-color: rgb(221, 51, 51);">
                  </span>
                </li>
              </ul>
            </div>
            <div class="pt-2 md:pt-4">
              <div class="flex items-center justify-between mb-4 space-s-3 sm:space-s-4">
                <div class="group flex items-center justify-between rounded-md overflow-hidden flex-shrink-0 border h-11 md:h-12 border-gray-300">
                  <button class="flex items-center justify-center flex-shrink-0 h-full transition ease-in-out duration-300 focus:outline-none w-10 md:w-12 text-heading border-e border-gray-300 hover:text-white hover:bg-heading" disabled="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12px" height="2px" viewBox="0 0 12 1.5">
                      <rect data-name="Rectangle 970" width="12px" height="2px" fill="currentColor">
                      </rect>
                    </svg>
                  </button>
                  <span class="font-semibold flex items-center justify-center h-full  transition-colors duration-250 ease-in-out cursor-default flex-shrink-0 text-base text-heading w-12  md:w-20 xl:w-24">1</span>
                  <button class="flex items-center justify-center h-full flex-shrink-0 transition ease-in-out duration-300 focus:outline-none w-10 md:w-12 text-heading border-s border-gray-300 hover:text-white hover:bg-heading">
                    <svg data-name="plus (2)" xmlns="http://www.w3.org/2000/svg" width="12px" height="12px" viewBox="0 0 12 12">
                      <g data-name="Group 5367">
                        <path data-name="Path 17138" d="M6.749,5.251V0h-1.5V5.251H0v1.5H5.251V12h1.5V6.749H12v-1.5Z" fill="currentColor">
                        </path>
                      </g>
                    </svg>
                  </button>
                </div>
                <button data-variant="flat" class="text-[13px] md:text-sm leading-4 inline-flex items-center cursor-pointer transition ease-in-out duration-300 font-semibold font-body text-center justify-center border-0 border-transparent placeholder-white focus-visible:outline-none focus:outline-none rounded-md  bg-heading text-white px-5 md:px-6 lg:px-8 py-4 md:py-3.5 lg:py-4 hover:text-white hover:bg-gray-600 hover:shadow-cart cursor-not-allowed hover:cursor-not-allowed w-full h-11 md:h-12 px-1.5 bg-gray-400 hover:bg-gray-400" disabled="">Add To Cart</button>
              </div>
              <button data-variant="flat" class="text-[13px] md:text-sm leading-4 inline-flex items-center cursor-pointer transition ease-in-out duration-300 font-semibold font-body text-center justify-center border-0 border-transparent placeholder-white focus-visible:outline-none focus:outline-none rounded-md  bg-heading text-white px-5 md:px-6 lg:px-8 py-4 md:py-3.5 lg:py-4 hover:text-white hover:bg-gray-600 hover:shadow-cart w-full h-11 md:h-12">View Details</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <AddProductToCart :namespace="product.namespace" />
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
