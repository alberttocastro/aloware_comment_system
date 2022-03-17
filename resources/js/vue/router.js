import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

let router = new Router({
    mode: 'history',
    routes: [
        {
            path: '',
            name: 'home',
            component: require('.pages/IndexPage.vue').default
        },
        {
            path: '/post',
            name: 'post',
            component: require('.pages/PostPage.vue').default
        },
    ]
});

export default router
