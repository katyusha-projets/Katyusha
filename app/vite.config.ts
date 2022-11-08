import path from 'path'
import {UserConfigExport} from 'vite'
import Vue from '@vitejs/plugin-vue'
import Pages from 'vite-plugin-pages'
import Layouts from 'vite-plugin-vue-layouts'
import Components from 'unplugin-vue-components/vite'
import AutoImport from 'unplugin-auto-import/vite'
import { VitePWA } from 'vite-plugin-pwa'
import Inspect from 'vite-plugin-inspect'
import eslintPlugin from '@nabla/vite-plugin-eslint'
import viteCompression from 'vite-plugin-compression'
import viteSSR from 'vite-ssr/plugin.js'


interface IViteConfig {
  base: string
  appBaseDir: string
}

export const viteConfig = (params: IViteConfig): UserConfigExport => {

  const {base} = params

  const alias = {
    '~/': `${params.appBaseDir}/src/`,
    '@app/vue/': `${path.resolve(__dirname, 'packages/vue/src')}/`
  }

  return {
    base,
    server: {
      host: `0.0.0.0`,
      port: 3333
    },

    resolve: {
      alias: alias
    },

    plugins: [
      viteSSR(),
      // https://github.com/nabla/vite-plugin-eslint
      eslintPlugin(),
      viteCompression({ algorithm:'brotliCompress', ext: 'br', deleteOriginFile: false }),

      Vue({
        include: [/\.vue$/, /\.md$/],
        reactivityTransform: true
      }),

      // https://github.com/hannoeru/vite-plugin-pages
      Pages({
        extensions: ['vue', 'md']
      }),

      // https://github.com/JohnCampionJr/vite-plugin-vue-layouts
      Layouts(),

      // https://github.com/antfu/unplugin-auto-import
      AutoImport({
        imports: [
          'vue',
          'vue-router',
          'vue-i18n',
          'vue/macros',
          '@vueuse/head',
          '@vueuse/core'
        ],
        dts: 'src/auto-imports.d.ts',
        dirs: [
          'src/composables',
          'src/store'
        ],
        vueTemplate: true
      }),

      // https://github.com/antfu/unplugin-vue-components
      Components({
        // allow auto load markdown components under `./src/components/`
        extensions: ['vue', 'md'],
        // allow auto import and register components used in markdown
        include: [/\.vue$/, /\.vue\?vue/, /\.md$/],
        dts: 'src/components.d.ts'
      }),

      // https://github.com/antfu/vite-plugin-pwa
      VitePWA({
        registerType: 'autoUpdate',
        includeAssets: ['favicon.svg', 'safari-pinned-tab.svg'],
        manifest: {
          name: 'Katyusha',
          short_name: 'Katyusha',
          theme_color: '#ffffff',
          icons: [
            {
              src: '/pwa-192x192.png',
              sizes: '192x192',
              type: 'image/png'
            },
            {
              src: '/pwa-512x512.png',
              sizes: '512x512',
              type: 'image/png'
            },
            {
              src: '/pwa-512x512.png',
              sizes: '512x512',
              type: 'image/png',
              purpose: 'any maskable'
            }
          ]
        }
      }),

      // https://github.com/antfu/vite-plugin-inspect
      // Visit http://localhost:3333/__inspect/ to see the inspector
      Inspect()
    ],

    // https://github.com/vitest-dev/vitest
    test: {
      include: ['test/**/*.test.ts'],
      environment: 'jsdom',
      deps: {
        inline: ['@vue', '@vueuse', 'vue-demi']
      }
    },

    ssr: {
      // TODO: workaround until they support native ESM
      noExternal: ['workbox-window', /vue-i18n/]
    }
  }
}
