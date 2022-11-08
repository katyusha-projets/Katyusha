import {viteConfig} from '../../vite.config'
import { defineConfig } from 'vite'
import path from "path";

const config = viteConfig({
  base: 'https://katyusha.ch',
  appBaseDir: path.resolve(__dirname)
})

export default defineConfig(config)
