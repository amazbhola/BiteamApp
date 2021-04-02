<template>
    <div class="container">
        <app-header></app-header>
        <home-page></home-page>
        <app-footer></app-footer>
    </div>
</template>
<script>

import AppHeader from './components/Header';
import AppFooter from './components/Footer';
import HomePage from './pages/Homepage';
export default {
    components:{AppHeader,AppFooter,HomePage}
}
</script>
<style scoped>

</style>