import Vue from 'vue';
import router from './router';
import App from './components/App';
import Home from './components/Home'
import VueSweetalert2 from 'vue-sweetalert2'; 
import { BootstrapVue} from 'bootstrap-vue'


Vue.use(BootstrapVue);


import 'sweetalert2/dist/sweetalert2.min.css';
 
Vue.use(VueSweetalert2);
Vue.use(BootstrapVue);

require('./bootstrap');

const app = new Vue({
    el: '#app',
    components: {
        App,Home
    },
    router
});