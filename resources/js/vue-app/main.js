import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './App';
import HomePage from './pages/Homepage';
import ProductPage from './pages/ProductPage';
import CheckoutPage from './pages/Checkout';
import CheckoutSuccess from './pages/CheckoutSuccess';
import CheckoutFailure from './pages/CheckoutFailure';
import Vuelidate from 'vuelidate';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuelidate);
Vue.use(Vuex);
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
      'name':'checkout-page',
      'path':'/checkout',
      'params':{
          product:null,
          quentity:null
      },
      'component':CheckoutPage
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


   const store = new Vuex.Store({
    state: {
        products: [],
        checkOut: {
            CheckoutProduct: {},
            CheckoutQuantity: null,
        }
    },
    mutations: {
        SET_PRODUCTS(state, updatedProducts){
            state.products = updatedProducts
        },
        SET_CHECKOUT_PRODUCT(state,updateCheckoutProduct){
            state.checkOut = updateCheckoutProduct
        }
     },
    actions: {
       async loadProductFormDb({commit}){
            const DBurl = 'http://localhost:8000/api/v1/product';
            const getAllProduct = await axios.get(DBurl);
            const result= getAllProduct.data;
            commit('SET_PRODUCTS', result)

        }
     },
    getters: {
        getAllProducts(state){
            return state.products.data;
        },
        getProductBySlug(state){
            return(slug)=>{
                return state.products.data.find((item)=>item.slug === slug);
            }
        },
        getProductForCheckout(state){
            return state.checkOut;
        }
    }
  })

new Vue({
   router,
   store,
   render: h=>h(App)
}).$mount('#vueApp');
