<template>
    <div>
         <div id="gototop"> </div>
        <header id="header">
            <div class="row">
                <div class="span4">
                        <router-link :to="{name: 'home-page'}">
                            <img src="https://picsum.photos/50/50"/>
                        </router-link>
                </div>
                <div class="span4">
                    <div class="offerNoteWrapper">
                        <h1 class="dotmark">
                            <i class="icon-cut"></i>
                            Twitter Bootstrap shopping cart HTML template is available @ $14
                        </h1>
                    </div>
                </div>
                <div class="span4 alignR">
                    <p><br> <strong> Support (24/7) : 0800 1234 678 </strong><br><br></p>
                    <router-link :to="{name:'chackout-page'}"><span class="btn btn-mini">[ 2 ] <span class="icon-shopping-cart"></span></span></router-link>

                    <span class="btn btn-warning btn-mini">$</span>
                    <span class="btn btn-mini">&pound;</span>
                    <span class="btn btn-mini">&euro;</span>
                </div>
            </div>
        </header>
    </div>
</template>
