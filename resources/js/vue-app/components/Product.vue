<template>
    <div>
        <router-link :to="{name:'product-page'}">
                    <div class="thumbnail">
                        
                        <a href="product_details.html" class="overlay"></a>
                        <a
                            class="zoomTool"
                            href="product_details.html"
                            title="add to cart"
                            ><span class="icon-search"></span> QUICK VIEW</a
                        >
                        
                    <img  :src="product.image" alt=""/>
                        
                        <div class="caption cntr">
                            <p>{{ product.name }}</p>
                            <p><strong>{{product.price}} Taka</strong></p>
                            <h4>
                                <router-link  class="shopBtn" title="add to cart"  >Add to cart</router-link>
                                
                            </h4>
                            <div class="actionList">
                                <a class="pull-left" href="#">Add to Wish List </a>
                                <a class="pull-left" href="#"> Add to Compare </a>
                            </div>
                            <br class="clr" />
                        </div>
                    </div>
                </router-link>
    </div>
</template>
<script>
export default {
    props:['product']
};
</script>