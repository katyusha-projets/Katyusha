<template>
  <div class="wave">
    <svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 115.9" style="enable-background:new 0 0 1920 115.9;" xml:space="preserve">
      <path id="Path_842" class="st1" d="M1600.7,0C1401,0,1159.4,100,960.1,100S519.1,0,319.5,0S-2,50-2,50l0.1,67.9l1924,0l0-67.9 C1922,50,1800.3,0,1600.7,0z" />
    </svg>
  </div>
</template>

<style lang="scss" scoped>
.wave {
  position: absolute;
  bottom: 0;

  &:after {
    position: absolute;
    left:0;
    right:0;
    height:8px;
    bottom:-4px;
    background-color: #FFF;
    content:"";
  }

  svg {
    height: 30px;
    width: 100vw;

  }
}
.st0{fill:none;}
.st1{fill:#FFFFFF;}
</style>
