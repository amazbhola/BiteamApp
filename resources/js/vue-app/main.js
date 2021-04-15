import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './App';
import HomePage from './pages/Homepage';
import ProductPage from './pages/ProductPage';
import ChackoutPage from './pages/Chackout';
import CheckoutSuccess from './pages/CheckoutSuccess';
import CheckoutFailure from './pages/CheckoutFailure';
import Vuelidate from 'vuelidate';
import Vuex from 'vuex';

Vue.use(Vuelidate);
Vue.use(Vuex)
Vue.use(VueRouter);
const routes = [
   {
      'name':'home-page',
      'path':'/',
      'component':HomePage
   },
   {
      'name':'product-page',
      'path':'/product/:slug',
      'component':ProductPage
   },
   {
      'name':'chackout-page',
      'path':'/chackout',
      'params':{
          product:null,
          quentity:null
      },
      'component':ChackoutPage
   },
   {
      'name':'checkout-success',
      'path':'/checkout/success',
      'component':CheckoutSuccess
   },
   {
      'name':'checkout-failure',
      'path':'/checkout/failure',
      'component':CheckoutFailure
   }
];
const router = new VueRouter(
   {
      mode:'history',
      base:'/',
      fallback:true,
      routes
   }
   );


new Vue({
   router,
   render: h=>h(App)
}).$mount('#vueApp');
