window.Vue = require('vue');

import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'

import App from '@/js/vue/App.vue';

Vue.use(VueAxios, axios)
Vue.use(VueRouter)

import vuetify from './vuetify'

import router from '@/js/vue/router.js'

window.vm = new Vue({
    el: "#vue",
    router,
    vuetify,
    render: h => h(App)
})
