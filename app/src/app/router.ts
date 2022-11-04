import { RouteRecordRaw } from 'vue-router'
import index from '~/pages/index.vue'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    component: index
    // children: [
    //   {
    //     path: '',
    //     redirect: '/tabs/tab1'
    //   },
    //   {
    //     path: 'tab1',
    //     component: () => import('@/views/Tab1Page.vue')
    //   },
    //   {
    //     path: 'tab2',
    //     component: () => import('@/views/Tab2Page.vue')
    //   },
    //   {
    //     path: 'tab3',
    //     component: () => import('@/views/Tab3Page.vue')
    //   }
    // ]
  }
]

// const router = createRouter({
//   // history: createWebHistory(),
//   routes
// })

// export default router
