import { type ViteSSGContext } from 'vite-ssg'

export type UserModule = (ctx: ViteSSGContext) => void
export type ServicesModule = (ctx: ViteSSGContext) => void
export type StripeModule = (ctx: ViteSSGContext) => void

export * from './CatalogTypes'
export * from './CompanyTypes'
export * from './CustomerTypes'
export * from './InstanceTypes'
export * from './OrderTypes'
export * from './RecordTypes'
export * from './SessionType'
