<template>
  <div class="preloader">
    <svg class="svg" width="100px" height="100px" viewBox="-50 -50 100 100">
      <circle cx="0" cy="0" r="30" />
    </svg>
  </div>
</template>

<style lang="scss" scoped>
$stroke-max: 10;
$stroke-min: 4;
$svg-di: 300px;
$svg-circ: 3.14 * $svg-di;
$svg-time: 1.8s;
$svg-ease: linear;

.preloader {
  width: 200px;
  height: 200px;
}

.svg {
  position: absolute;
  top: 50%; left: 50%;
  width: $svg-di; height: $svg-di;
  transform: translate(-50%, -50%) rotate(0deg);
  animation: rotate $svg-time $svg-ease infinite;

  circle {
    fill: none;
    stroke: var(--primary);
    stroke-width: $stroke-min;
    stroke-linecap: round;
    stroke-dashoffset: -$svg-circ/6.7;
    stroke-dasharray:
      0.01,$svg-circ/1px,
      0.00,0,
      0.00,0,
      0.00,0;
    animation:
      stroke-dasharray $svg-time $svg-ease infinite,
      stroke-width     $svg-time $svg-ease infinite;
  }
}

@keyframes rotate {
  from { transform: translate(-50%,-50%) rotate(  0deg); }
  to   { transform: translate(-50%,-50%) rotate(360deg); }
}

@keyframes stroke-width {
  0%, 100% {
    stroke-width: $stroke-max*1.2;
  }
  5%, 95% {
    stroke-width: $stroke-max;
  }
  40%, 60% {
    stroke-width: $stroke-min;
  }
}

@keyframes stroke-dasharray {
  0%,5%,95%,100% {
    stroke-dasharray:
      0.01,$svg-circ,
      0.00,0,
      0.00,0,
      0.00,0;
  }
  50% {
    stroke-dasharray:
      0.01,($svg-circ - $stroke-min*9),
      0.01,$stroke-min*2.5,
      0.01,$stroke-min*3,
      0.01,$stroke-min*3.5;
  }
}

</style>
