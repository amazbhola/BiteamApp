<template>
    <div>
        <!-- <h3>Three Column Product view</h3> -->
        <ul class="thumbnails">
            <li class="span3" v-for="(product,key) in products" :key="key">
                <product-one :product="product"></product-one>
            </li>
        </ul>
        
    </div>
</template>
<script>
import ProductOne from '../components/Product';
export default {
    components:{ProductOne},
    data(){
    return {
        products:[
            {
                name :'Samsung',
                slug :'Samsung',
                price:1000,
                image:'https://picsum.photos/200/200',
                description:'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident eum doloremque quos quidem in odio quisquam molestiae? Asperiores, officiis laudantium illum reiciendis quo sed quibusdam non! Quisquam harum cum nisi!'
            },
            {
                name :'Xiaomi',
                slug :'Xiaomi',
                price:1500,
                image:'https://picsum.photos/200/200',
                description:'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident eum doloremque quos quidem in odio quisquam molestiae? Asperiores, officiis laudantium illum reiciendis quo sed quibusdam non! Quisquam harum cum nisi!'
            },
            {
                name :'Iphone',
                slug :'Iphone',
                price:1000,
                image:'https://picsum.photos/200/200',
                description:'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident eum doloremque quos quidem in odio quisquam molestiae? Asperiores, officiis laudantium illum reiciendis quo sed quibusdam non! Quisquam harum cum nisi!'
            },
            {
                name :'Nokia',
                slug :'Nokia',
                price:1000,
                image:'https://picsum.photos/200/200',
                description:'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident eum doloremque quos quidem in odio quisquam molestiae? Asperiores, officiis laudantium illum reiciendis quo sed quibusdam non! Quisquam harum cum nisi!'
            }
        ]
    }
}
}
</script>