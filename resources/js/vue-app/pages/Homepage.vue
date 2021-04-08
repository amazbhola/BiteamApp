<template>
    <div>
        <!-- <h3>Three Column Product view</h3> -->
        <ul class="thumbnails">
            <li class="span3" v-for="(product,key) in products" :key="key">
                <product-one :product="product"></product-one>
            </li>
            <li class="span3" v-for="(district,key) in districts.slice(0,10)" :key="key">{{ district.district  }} | {{ district.upazilla }}</li>
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
        districts:[],
    }
    },
    async created() {

        this.products= await this.dbProductData();
        this.districts = await this.bd_district();
    },
    methods:{
        async dbProductData(){
            const apiurl = 'http://localhost:8000/api/v1/product';
            const getdata = await Axios.get(apiurl);
            const result = getdata.data;

        return result.data;
        },
        async bd_district(){
            const dis_url = 'https://bdapis.herokuapp.com/api/v1.0/division/:divisionName';
            const dis_getdata = await Axios.get(dis_url);
            const result = dis_getdata.data;
            return result.data;
        }
    }
}
</script>
