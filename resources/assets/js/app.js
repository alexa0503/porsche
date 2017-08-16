
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');
var VueTouch = require('vue-touch');
window.Velocity = window.Velocity = require('velocity-animate');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('index', require('./components/Index.vue'));
Vue.use(VueTouch, {name: 'v-touch'});
const app = new Vue({
    el: '#photo',
    data() {
        return {
            user: null,
            images: null,
            serverId: null,
            loading: false
        }
    },
    mounted() {
        //console.log('Component mounted.')
    },
    methods: {
        onPanend: function(e) {
            //var dX = deltaX + e.deltaX;
            //var dY = deltaY + e.deltaY;
            //console.log(el);
            //Velocity.hook(this.$refs.img, 'translateX', dX + 'px');
            //Velocity.hook(this.$refs.img, 'translateY', dY + 'px');
        },
        onPanmove: function(e) {
            console.log(el);
        }
    }
});
