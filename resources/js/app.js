/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
import Form from './Form'
window.Form = Form
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';


Vue.use(ElementUI);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('tab-component', require('./components/TabComponent.vue').default);
Vue.component('data-component', require('./components/DataComponent.vue').default);


const app = new Vue({
    el: '#app',
});
