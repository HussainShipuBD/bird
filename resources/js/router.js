import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import index from './components/index.vue'
import birdDetails from './components/birdDetails.vue'

const router = new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'index',
      component: index
    },
    {
      path: '/birdDetails/:id',
      // path: '/birdDetails',
      name: 'birdDetails',
      component: birdDetails
    },
    

  ]
});

export default router;