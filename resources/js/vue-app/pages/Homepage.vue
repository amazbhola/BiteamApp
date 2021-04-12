<template>
    <div>
        <!-- <h3>Three Column Product view</h3> -->
        <ul class="thumbnails">
            <li class="span3" v-for="(product,key) in products" :key="key">
                <ProductOne :product="product"></ProductOne>
            </li>
        </ul>
    </div>
</template>
<script>
import ProductOne from '../components/Product';
import Axios from 'axios';
export default {
    components:{ProductOne},
    data(){
    return {
        products:[],

    }
    },
    async created() {

        this.products= await this.dbProductData();

    },
    methods:{
        async dbProductData(){
            const apiurl = 'http://localhost:8000/api/v1/product';
            const getdata = await Axios.get(apiurl);
            const result = getdata.data;

        return result.data;
        },

    }
}
</script>
