<script lang="ts" setup>
onMounted(() => {
  document.querySelectorAll('.donate').forEach(function(elem) {

    const inputElement = elem.querySelector('input')
    const form = elem.querySelector('form')

    form?.addEventListener('submit', e => {
      e.preventDefault()
      elem.classList.add('submit')
    })

    document.addEventListener('click', e => {
      if(e.target === form || form?.contains(e.target)) {
        return
      }

      if(e.target === elem || elem.contains(e.target)) {
        if(!elem.classList.contains('submit')) {
          if(elem.classList.contains('open')) {
            elem.classList.add('submit')
          } else {
            elem.classList.add('open')
            setTimeout(() => {
              inputElement.selectionStart = inputElement.selectionEnd = 10000
              inputElement.focus()
            }, 0)
          }
        }
        return
      }
      if(!elem.classList.contains('submit')) {
        elem.classList.remove('open')
      }
    })

  })
})

</script>

<template>
  <div class="donate">
    <div class="thanks">Thank you!</div>
    <button>
      <div class="top"></div>
      <div class="inside">
        <form>
          <input type="text" value="$0,00">
        </form>
      </div>
      <span>
        <svg viewBox="0 0 24 24">
          <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
        </svg>
        Donate
      </span>
    </button>
  </div>
</template>

<style lang="scss" scoped>
.donate {
  --input-background: #4171FE;
  --input-color: #FFFFFF;
  --input-line: #FFFFFF;
  --button-background: #FFFFFF;
  --button-background-hover: #ECEFFC;
  --button-color: #275EFE;
  --button-icon-color: #275EFE;
  --thanks-color: #FFFFFF;
  --letter-inner: #CEDAFF;
  --letter-inner-top: #E0E8FF;
  --letter-border: #E5E9F3;
  font-family: 'Roboto Mono', monospace;
  font-weight: 500;
  font-size: 14px;
  line-height: 20px;
  position: relative;
  text-align: center;
  width: 132px;
  &:not(.open) {
    &:hover {
      --background: var(--button-background-hover);
    }
    form {
      pointer-events: none;
    }
  }
  &.open {
    --span-opacity: 0;
    --span-opacity-delay: 0s;

    --letter-opacity: 1;
    --letter-opacity-delay: .2s;
    --letter-inside-opacity: 1;
    --letter-inside-opacity-delay: .4s;

    --border-radius: 2px;
    --border-radius-delay: 0s;

    &:not(.submit) {
      --input-y: -92px;
      --input-y-delay: .9s;

      --letter-top-y: 1px;
      --letter-top-rotate: 180deg;
      --letter-top-rotate-delay: .5s;
      --letter-top-index: 0;
      --letter-top-index-delay: .9s;
      --letter-background: var(--letter-inner-top);
      --letter-background-delay: .65s;

      --input-scale-background: 1;
      --input-scale-background-delay: 1.1s;
      --input-scale-line: 1;
      --input-scale-line-delay: 1.1s;
    }
    &.submit {
      button {
        animation: move .4s linear 1.1s forwards;
      }
    }
  }
  .thanks {
    position: absolute;
    left: 0;
    right: 0;
    top: 12px;
    color: var(--thanks-color);
    font-size: 16px;
    font-weight: 500;
  }
  button {
    display: block;
    cursor: pointer;
    font: inherit;
    position: relative;
    outline: none;
    border: none;
    width: 100%;
    margin: 0;
    padding: 12px 0;
    -webkit-appearance: none;
    transform-style: preserve-3d;
    border-radius: var(--border-radius, 6px);
    color: var(--button-color);
    background: var(--background, var(--button-background));
    transform-origin: 0 50%;
    transition: background .2s linear, border-radius .2s linear var(--border-radius-delay, 1.15s);
    &:before {
      content: '';
      border-width: 0 64px 32px 64px;
      width: 0;
      height: 0;
      position: absolute;
      left: 2px;
      bottom: 0;
      border-style: solid;
      border-color: transparent transparent var(--button-background) transparent;
      filter: drop-shadow(0 -1px 0 var(--letter-border));
      opacity: var(--letter-opacity, 0);
      transition: opacity .2s linear var(--letter-opacity-delay, 1.15s);
    }
    .inside {
      position: absolute;
      left: -40px;
      bottom: 16px;
      right: -40px;
      height: 120px;
      clip-path: polygon(0 0, 100% 0, 100% 72px, 50% 100%, 0 72px);
      opacity: var(--letter-inside-opacity, 0);
      transition: opacity 0s linear var(--letter-inside-opacity-delay, 1.15s);
      &:before {
        content: '';
        height: 28px;
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--letter-inner);
      }
      form {
        width: 200px;
        position: absolute;
        bottom: -12px;
        left: 50%;
        margin: 0;
        transform-style: preserve-3d;
        transform: translate(-50%, var(--input-y, 0)) translateZ(0);
        transition: transform .3s ease-out var(--input-y-delay, .25s);
        &:before,
        &:after {
          content: '';
          display: block;
          position: absolute;
          left: 0;
          right: 0;
          bottom: 0;
          backface-visibility: hidden;
          background: var(--b, var(--input-background));
          transform: scaleX(var(--scale, var(--input-scale-background, .6))) translateZ(0);
          transition: opacity .25s linear, transform .25s linear var(--delay, var(--input-scale-background-delay, 0s));
        }
        &:before {
          top: 0;
        }
        &:after {
          --b: var(--input-line);
          --scale: var(--input-scale-line, 0);
          --delay: var(--input-scale-line-delay, 0s);
          height: 1px;
          opacity: var(--line-opacity, .5);
        }
        input {
          display: block;
          position: relative;
          z-index: 1;
          font: inherit;
          text-align: center;
          outline: none;
          border: none;
          background: none;
          width: 100%;
          margin: 0;
          padding: 8px 0;
          -webkit-appearance: none;
          color: var(--input-color);
        }
        &:focus-within {
          --line-opacity: 1;
        }
      }
    }
    .top {
      position: absolute;
      z-index: var(--letter-top-index, 2);
      top: 0;
      left: 2px;
      transform-origin: 50% 0;
      transform: translateY(var(--letter-top-y, 0)) rotateX(var(--letter-top-rotate, 0deg)) translateZ(0);
      opacity: var(--letter-opacity, 0);
      border-style: solid;
      border-width: 28px 64px 0 64px;
      border-color: var(--letter-background, var(--button-background)) transparent transparent transparent;
      transition: z-index 0s linear var(--letter-top-index-delay, .6s), border-color .1s linear var(--letter-background-delay, .75s),  opacity .2s linear var(--letter-opacity-delay, 1.15s), transform .3s linear var(--letter-top-rotate-delay, .6s);
      filter: drop-shadow(0 var(--letter-blur, 1px) 0 var(--letter-border));
    }
    span {
      display: block;
      opacity: var(--span-opacity, 1);
      transition: opacity .15s linear var(--span-opacity-delay, 1.25s);
      svg {
        display: inline-block;
        vertical-align: top;
        margin: 2px 0 0 0;
        width: 16px;
        height: 16px;
        stroke-linecap: round;
        stroke-linejoin: round;
        fill: none;
        stroke-width: 2.5;
        transform: translate(-4px, 0);
        stroke: var(--button-icon-color);
      }
    }
  }
}

@keyframes move {
  20% {
    transform: translateX(-2px);
  }
  60% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    transform: translateX(320px);
  }
}

html {
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
}

* {
  box-sizing: inherit;
  &:before,
  &:after {
    box-sizing: inherit;
  }
}

// dribbble & twitter
body {
  overflow: hidden;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #275EFE;
  .dribbble {
    position: fixed;
    display: block;
    right: 20px;
    bottom: 20px;
    img {
      display: block;
      width: 76px;
    }
  }
  .twitter {
    position: fixed;
    display: block;
    right: 112px;
    bottom: 14px;
    svg {
      width: 24px;
      height: 24px;
      fill: white;
    }
  }
}
</style>
