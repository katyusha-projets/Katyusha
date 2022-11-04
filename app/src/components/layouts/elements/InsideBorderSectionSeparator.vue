<template>
  <div class="separator"></div>
  <div class="separator-space"></div>
</template>

<style lang="scss" scoped>
$color:#FFF;

.separator-space {
  background-color: $color;
  height:22px;
}

.separator {
  position: relative;
}

.separator::after {
  content: "";
  position: absolute;
  background-color: #FFF;
  height: 50px;
  width: 46px;
  right: -94px;
  top: -29px;
  transform: rotate(44deg);
}

.separator::before {
  content: "";
  position: absolute;
  background-color: transparent;
  height: 40px;
  width: 45px;
  border-top-left-radius: 85px;
  box-shadow: 0px -6px 0 0 #ffffff;
  transform: rotate(182deg);
  right: -57px;
  top: -39px;
}
</style>
