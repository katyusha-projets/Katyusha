<script setup lang="ts">
import StocksService from '~/apps/stocks/services/StocksService'
import { StockType } from '~/types/StockTypes'

const service = new StocksService()
const tickers = await service.fetch<StockType>()

import { customerLogos } from '~/app/data/pages/logos'
import {
  jobTopics,
  jobs
} from '~/app/data/pages/stockFrontpageData'
</script>

<template>
  <div>
    <HeroV1 />

    <LogoMarquee :logos="customerLogos" compact />

    <Section id="job-offers" wave="wave-1">
      <Container>
        <SectionTitle title="Largest market cap" subtitle="Featured" />
        <JobGrid :jobs="jobs" />
      </Container>
    </Section>

    <Section color="grey">
      <Container>
        <SectionTitle title="Hot Indexes" subtitle="Trending" />

        <JobTopics :topics="jobTopics" :limit="12" />
      </Container>
    </Section>

    <Section color="grey" wave="wave-2" shape-color="footer-dark">
      <Container>
        <CompanyGrid
          class="-mt-6"
          title="We work with the leaders"
          :logos="customerLogos"
          :limit="20"
        />
      </Container>
    </Section>
  </div>
</template>
