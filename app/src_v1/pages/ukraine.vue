<script async setup lang="ts">
import { useServiceSearch } from '~/composables/useServiceSearch'
import $services from '~/app/services'
import { donationCards, masonryImages } from '~/app/config/ukraineComponents'

const router = useRouter()
const service = $services.company

const serviceSearch = useServiceSearch()
const { results } = serviceSearch
const term = ref('')

// const go = () => {
//   if (name) router.push(`/hi/${encodeURIComponent(name)}`)
// }

watch(term, (currentValue, oldValue) => {
  serviceSearch.search(service, currentValue)
})

</script>

<template>
  <div>
    <Hero :videos="['flag', 'girl', 'city']" videos-dir="/ukraine/videos">
      <template #preheading></template>
      <template #heading><h1>Help us to save <span class="ukraine-line">Ukraine</span>🇺🇦</h1></template>
      <template #subheading><h3>We have helped tens of thousands of refugees fleeing this unjust war<br />Only with your help can we continue</h3></template>
    </Hero>
    <ContentSection :dark="true">
      <template #below-image>
        <Masonry class="mt-2" :width="160" :images="masonryImages" />
      </template>
    </ContentSection>
    <CardsList :cards="donationCards" title="Donate directly to a specific need" subtitle="Donate based on what you can afford and we will allocate your donation precisely to where you feel it is best spent" />
  </div>
</template>

<style lang="scss">

.ukraine-line {
  position: relative;

  &:before, &:after {
    content:"";
    display:block;
    position: absolute;
    left:0;
    right:0;
    bottom:0;
    height:2px;
  }

  &:before {
    background-color: var(--ua-blue);
    transform: rotate(-3deg);
  }

  &:after {
    background-color: var(--ua-yellow);
    transform: rotate(1deg);
    bottom:-2px;
  }
}

.card-list-headings {

  h1 {
    color: var(--color-red);
    padding: 0;
    font-size: 3.2rem;
    line-height: 4.5rem;
    text-align: center;
  }

  h3 {
    text-align: center;
    max-width: 75%;
    margin: 0 auto;
  }
}
</style>
