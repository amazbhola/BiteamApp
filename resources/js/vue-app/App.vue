<template>
    <div class="container">
        <div class="row">
            <app-header></app-header>
            <app-sidebar></app-sidebar>
            <router-view></router-view>
            <app-footer></app-footer>
        </div>
    </div>
</template>
<script>
import AppHeader from "./components/Header";
import AppFooter from "./components/Footer";
import AppSidebar from "./components/SidebarComponents";

export default {
    components: { AppHeader, AppFooter, AppSidebar }
};
</script>
<style scoped></style>
