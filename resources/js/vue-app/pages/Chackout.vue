<template>
    <div>
         <div class="span9">
             <div style="margin-right: -40px; margin-left: 15px;" class="singlepage">
                  <div class="well well-small">
            <h1>Check Out <small class="pull-right"> 2 Items are in the cart </small></h1>
            <hr class="soften" />

            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Description</th>
                        <th> Ref. </th>
                        <th>Avail.</th>
                        <th>Unit price</th>
                        <th>Qty </th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img width="100" :src="'/'+ChackoutProduct.image" alt=""></td>
                        <td>{{ ChackoutProduct.name }}<br>Carate : 22<br>Model : n/a</td>
                        <td> - </td>
                        <td><span class="shopBtn"><span class="icon-ok"></span></span> </td>
                        <td>{{ ChackoutProduct.price }}</td>
                        <td>
                            {{ ChackoutQuantity }}
                        </td>
                        <td>Tk: {{getTotalPrice}}</td>
                    </tr>
                    <!-- <tr>
                        <td><img width="100" src="assets/img/f.jpg" alt=""></td>
                        <td>Item names and brief details<br>Carate:24 <br>Model:HBK24</td>
                        <td> - </td>
                        <td><span class="shopBtn"><span class="icon-ok"></span></span> </td>
                        <td>$348.42</td>
                        <td>
                            <input class="span1" style="max-width:34px" placeholder="1" size="16" type="text">
                            <div class="input-append">
                                <button class="btn btn-mini" type="button">-</button><button class="btn btn-mini"
                                    type="button">+</button><button class="btn btn-mini btn-danger" type="button"><span
                                        class="icon-remove"></span></button>
                            </div>
                        </td>
                        <td>$348.42</td>
                    </tr> -->
                    <tr>
                        <td colspan="6" class="alignR">Total products: </td>
                        <td>Tk: {{getTotalPrice}}</td>
                    </tr>

                </tbody>
            </table><br />


            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>
                            <form class="form-inline">
                                <label style="min-width:159px"> VOUCHERS Code: </label>
                                <input type="text" class="input-medium" placeholder="CODE">
                                <button type="submit" class="shopBtn"> ADD</button>
                            </form>
                        </td>
                    </tr>

                </tbody>
            </table>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>ESTIMATE YOUR SHIPPING & TAXES</td>
                    </tr>
                    <tr>
                        <td>
                            <form class="form-horizontal" @submit.prevent="PlaceOrder">
                                <div class="control-group">
                                    <label class="span2 control-label">Customar Name</label>
                                    <div class="controls">
                                        <input type="text" v-model ="formdata.customer_name" name="customar_name" placeholder="Customar Name" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="span2 control-label" >Email Address</label>
                                    <div class="controls">
                                        <input type="email" v-model="formdata.customer_email" name="customar_email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="span2 control-label" for="">Mobile No</label>
                                    <div class="controls">
                                       <input type="number" min="11" v-model="formdata.customer_mobile_no" name="customar_mobile_no" id="" placeholder="Mobile No" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="span2 control-label" for="">Customar Address</label>
                                    <div class="controls">
                                       <input type="text" v-model="formdata.customer_address" name="customar_address" id="" placeholder="Customar Address" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                       <button class="shopBtn" type="submit">Place Order</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="products.html" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping
            </a>
            <a href="login.html" class="shopBtn btn-large pull-right">Next <span class="icon-arrow-right"></span></a>

        </div>
             </div>
         </div>
    </div>
</template>
<script>
import Axios from 'axios';
export default {
    data() {
        return {
            ChackoutProduct:null,
            ChackoutQuantity:null,
            formdata :{
                customer_name:'',
                customer_email:'',
                customer_mobile_no:'',
                customer_address:'',
            }
        }
    },
    beforeMount() {
        this.ChackoutProduct = this.$route.query.product;
        this.ChackoutQuantity = parseInt(this.$route.query.quantity);
    },

    computed:{
        getTotalPrice(){
            if (this.ChackoutQuantity !== null && this.ChackoutProduct !== null) {
               const total = this.ChackoutQuantity * this.ChackoutProduct.price;
               return total;
            } else {
                return 0;
            }
        }
    },
    methods: {

        async PlaceOrder(){

                const Orderdata = this.getOrderdata();
            const orderurl = 'http://localhost:8000/api/v1/product';
            const createdata = await Axios.post(orderurl, Orderdata);
            if (!createdata) {
                this.$router.push({name:'checkout-failure'})
            }else{
                this.$router.push({name:'checkout-success'})
            }


        },
        getOrderdata(){
            const OrderData ={
                product_id: this.ChackoutProduct.id,
                quantity: this.ChackoutQuantity,
                total: this.getTotalPrice,
                shipping_address:this.formdata
            }
            return OrderData;

        }
    },

}
</script>
<style scoped>

</style>
