require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'

Vue.component('product', require('./components/product.vue').default);

const app = new Vue({
    el: '#app',
    data:{},
});
