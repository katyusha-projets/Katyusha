<script setup lang="ts">
// https://github.com/vueuse/head
// you can use this to manipulate the document head in any components,
// they will be rendered correctly in the html results with vite-ssg
useHead({
  title: 'Katyusha',
  meta: [
    { name: 'description', content: 'Opinionated Vite Starter Template' },
    {
      name: 'theme-color',
      content: '#FFFFFF'
    }
  ],
  link: [
    {
      rel: 'icon',
      type: 'image/svg+xml',
      href: '/favicon.svg'
    }
  ]
})
</script>

<template>
  <Suspense>
    <div class="col-span-2 lg:row-span-2 col-span-full lg:col-span-2 cursor-pointer group flex flex-col bg-gray-200 rounded-md relative items-center justify-between overflow-hidden"><div class="flex justify-center items-center p-4 h-full 3xl:min-h-[330px]" title="Nike Bag"><span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;"><span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;"><img alt="" aria-hidden="true" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjIwIiBoZWlnaHQ9IjYyMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2ZXJzaW9uPSIxLjEiLz4=" style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span><img alt="Nike Bag" src="/_next/image?url=%2Fassets%2Fimages%2Fproducts%2Ffeatured%2F1.png&amp;w=1920&amp;q=75" decoding="async" data-nimg="intrinsic" class="transition duration-500 ease-in-out transform group-hover:scale-110" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: contain;" srcset="/_next/image?url=%2Fassets%2Fimages%2Fproducts%2Ffeatured%2F1.png&amp;w=640&amp;q=75 1x, /_next/image?url=%2Fassets%2Fimages%2Fproducts%2Ffeatured%2F1.png&amp;w=1920&amp;q=75 2x"><noscript></noscript></span></div><span class="absolute top-3.5 md:top-5 3xl:top-7 start-3.5 md:start-5 3xl:start-7 bg-heading text-white text-10px md:text-sm leading-5 rounded-md inline-block px-2 xl:px-3 pt-0.5 pb-1">20% </span><div class="flex flex-col md:flex-row lg:flex-col 2xl:flex-row md:justify-between md:items-center lg:items-start 2xl:items-center w-full px-4 md:px-5 3xl:px-7 pb-4 md:pb-5 3xl:pb-7" title="Nike Bag"><div class="md:pe-2 lg:pe-0 2xl:pe-2 overflow-hidden"><h2 class="text-heading font-semibold text-sm md:text-base xl:text-lg mb-1 truncate">Nike Bag</h2><p class="text-body text-xs xl:text-sm leading-normal xl:leading-relaxed truncate max-w-[250px]">Rolex’s powerhouse calibre 3235 Perpetual movement. An upgrade from the calibre 3135 movement</p></div><div class="flex-shrink-0 flex flex-row-reverse md:flex-col lg:flex-row-reverse 2xl:flex-col items-center md:items-end lg:items-start 2xl:items-end justify-end md:text-end lg:text-start xl:text-end mt-2 md:-mt-0.5 lg:mt-2 2xl:-mt-0.5"><del class="text-sm md:text-base lg:text-sm xl:text-base 3xl:text-lg">$20.38</del><div class="text-heading font-segoe font-semibold text-base md:text-xl lg:text-base xl:text-xl 3xl:text-2xl 3xl:mt-0.5 pe-2 md:pe-0 lg:pe-2 2xl:pe-0">$16.38</div></div></div></div>
    <RouterView />
  </Suspense>
</template>
