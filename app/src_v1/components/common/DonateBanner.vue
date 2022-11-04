<template>
  <section id="donate-banner">
    <div class="container flex justify-between">
      <div>
        <div class="title">Donate now</div>
        <div class="subtitle">We are in need of your support to keep helping those in need</div>
      </div>
      <DonateForm />
    </div>
  </section>
</template>

<style lang="scss">
#donate-banner {
  position: fixed;
  bottom: 0;
  right: 0;
  left: 0;
  z-index: 1000;
  backdrop-filter: blur(4px);
  background: #ffffff3b;

  .title {}
  .subtitle {}
}
</style>
