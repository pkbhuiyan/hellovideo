require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios';
import toastr from 'toastr';
import VueRouter from 'vue-router';
import routes from './routes';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import VueCarousel from 'vue-carousel';
import VueProgressBar from 'vue-progressbar';

Vue.config.productionTip = false

import Vue from 'vue';
import VuePlyr from 'vue-plyr';
import 'vue-plyr/dist/vue-plyr.css'; 
// only if your build system can import css, otherwise import it wherever you would import your css.
import VueFacebook from 'vue-facebook';
Vue.use(VueFacebook)



import Gate from './Gate';
Vue.prototype.$gate = new Gate(window.isLogin);

var SocialSharing = require('vue-social-sharing');

Vue.use(SocialSharing);

Vue.use(VuePlyr);
Vue.use(VueCarousel);
Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '2px',
  })

window.toastr = toastr;






// debounce
function debounce(fn, delay = 300) {
	var timeoutID = null;

    return function () {
		clearTimeout(timeoutID);

        var args = arguments;
        var that = this;

        timeoutID = setTimeout(function () {
        	fn.apply(that, args);
        }, delay);
    }
};

// this is where we integrate the v-debounce directive!
// We can add it globally (like now) or locally!
Vue.directive('debounce', (el, binding) => {
	if (binding.value !== binding.oldValue) {
		// window.debounce is our global function what we defined at the very top!
		el.oninput = debounce(ev => {
			el.dispatchEvent(new Event('change'));
		}, parseInt(binding.value) || 300);
	}
});






// all Basic components vue
Vue.component('login', require('./components/Login.vue').default);
Vue.component('validation', require('./components/SignInUp.vue').default);
Vue.component('search-result', require('./components/SearchResult.vue').default);
Vue.component('vframe', require('./components/Vframe.vue').default);

// vue router setup
const router = new VueRouter({
    mode:'hash',
    routes,
    linkActiveClass: 'active',
})

// vue app setup
const app = new Vue({
    el: '#app',
    router,
});
