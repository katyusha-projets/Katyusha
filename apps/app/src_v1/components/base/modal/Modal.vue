<script setup lang="ts">
// import { useI18n } from 'vue-i18n'

import { useModalStore } from '~/store/modals'

type ModalSize = 'small' | 'medium' | 'large' | 'big'
type ModalAction = 'center' | 'right'

interface ModalEmits {
  (e: 'close'): void
}

interface ModalProps {
  title?: string
  size?: ModalSize
  actions?: ModalAction
  open?: boolean
  rounded?: boolean
  noscroll?: boolean
  noclose?: boolean
  tabs?: boolean
  cancelLabel?: string
}

const emit = defineEmits<ModalEmits>()
const props = withDefaults(defineProps<ModalProps>(), {
  title: undefined,
  size: undefined,
  actions: undefined,
  cancelLabel: undefined
})

const modalStore = useModalStore()

// const { t } = useI18n()
const wasOpen = ref(false)
// const cancelLabel = computed(() => props.cancelLabel || t('cancel-label'))

// const checkScroll = () => {
//   if (props.noscroll && props.open) {
//     document.documentElement.classList.add('no-scroll')
//     wasOpen.value = true
//   } else if (wasOpen.value && props.noscroll && !props.open) {
//     document.documentElement.classList.remove('no-scroll')
//     wasOpen.value = false
//   }
// }
//
// watchEffect(checkScroll)
onUnmounted(() => {
  document.documentElement.classList.remove('no-scroll')
})

const close = () => {
  emit('close')
}
</script>

<!--i18n lang="yaml">
de:
  cancel-label: 'Abbrechen'
en:
  cancel-label: 'Cancel'
es-MX:
  cancel-label: 'Cancelar'
es:
  cancel-label: 'Cancelar'
fr:
  cancel-label: 'Annuler'
zh-CN:
  cancel-label: '取消'
</i18n-->

<template>
  <teleport to="body">
    <div :class="[open && 'is-active', size && `is-${size}`]" class="modal v-modal">
      <slot name="header" />
      <div class="modal-content">
        <div v-if="false" class="header-placeholder"></div>
        {{ modalStore.openModals }}
        <slot name="content"></slot>
      </div>
    </div>
  </teleport>
</template>

<style lang="scss" scoped>
.modal-close {
  color:#000;
}

.overlay {
  pointer-events: none;
  z-index: 1000 !important;
  position: fixed;
  top:0;
  right:0;
  bottom:0;
  left:0;
}

.header-placeholder {
  width:100%;
  height: 62px;
}

header {
  position: absolute;
  height: 62px;
  line-height: 62px;
  left: 0;
  right: 0;
  top: 0;
  background: #ffffffa3;
  z-index: 100000;
  backdrop-filter: blur(4px);

  h3 {
    height: 62px;
    line-height: 62px;
    text-align: center;
    font-size: 1.4rem;
    font-weight: 300;
  }

}

.close {
  position: absolute;
  top: 1rem;
  right: 1rem;
  font-size: 1.1rem;
  text-align: center;
  color: #FFF;
  line-height: 36px;
  height: 36px;
  width: 36px;
  background: #000;
  border-radius: 100px;
  z-index: 10000;
}

.modal {
  transition: all 0.5s;
  backdrop-filter: blur(4px);
  z-index: 2000 !important;

  .modal-content {
    transition: all 0.4s;
  }
}

.v-modal {
  &.is-active {
    display: block !important;
    z-index: 200 !important;

    .v-modal-close {
      cursor: pointer;
    }
  }

  .v-modal-card {
    width: 100%;
    background: var(--modal-bg-color);
    border: 1px solid var(--modal-border-color);
    border-radius: 8px;
    padding: 40px;
  }

  .modal-background {
    background-color: var(--night);
    opacity: 0.8;
  }

  .modal-content {
    transform: scale(1) !important;
    opacity: 1 !important;
    -webkit-animation: fadedown 0.5s;
    animation: fadedown 0.5s;
    padding: 0;
    max-height: unset;
    display: block;
    flex-direction: unset;
    max-width: 100%;
    height: 100vh;
    top: 0;
    margin: auto;
    width: 100vw;

    @media(max-width: 640px) {

    }

    .content {
      overflow: hidden;
      overflow-y: scroll;
    }

    .modal-card {
      max-width: 100%;
      margin: 0 auto;

      &.is-rounded {
        border-radius: 12px;
      }

      .modal-card-body {
        padding:0;

        .modal-form {
          padding: 10px 0 20px;
        }

        &.has-tabs {
          padding: 0;
          overflow-x: hidden;

          .tabs {
            overflow-x: auto;

            &::-webkit-scrollbar {
              height: 5px !important;
            }

            &::-webkit-scrollbar-thumb {
              border-radius: 10px !important;
              background: rgb(0 0 0 / 20%) !important;
            }

            a {
              padding: 0.75em 1em;
            }
          }
        }
      }

      .modal-card-foot {
        background-color: var(--modal-bg-color);
        padding: 0 1.5rem 1rem;
        border: none;
        border-bottom-left-radius: 1rem;
        border-bottom-right-radius: 1rem;

        &.no-border {
          border-top-color: transparent;
        }

        &.is-start {
          justify-content: flex-start !important;
        }

        &.is-centered {
          justify-content: center !important;
        }

        &.is-end {
          justify-content: flex-end !important;
        }
      }
    }
  }
}

@media screen and (min-width: 769px) {
  .modal.modal-lg {
    .modal-card,
    .modal-content {
      width: 800px !important;
    }
  }

  .modal.modal-sm {
    .modal-card,
    .modal-content {
      width: 400px !important;
    }
  }
}
</style>
