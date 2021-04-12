<template>
    <div>

        <router-link :to="{name:'product-page',params:{slug:product.slug}}">
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
                                <a name="" id="" class="shopBtn" title="add to cart" href="#" role="button">Add to cart</a>

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
