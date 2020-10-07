let Watchlist = require('./components/Watchlist.vue');
let Home = require('./components/Home.vue');
let Video = require('./components/Video.vue');
let ContactUs = require('./components/ContactUs.vue');

const routes = [
    { path: '/', component: Home.default },
    { path: '/watchlist', component: Watchlist.default },
    { path: '/video/:id', component: Video.default, props:true},
    { path: '/contact', component: ContactUs.default},
]


export default routes