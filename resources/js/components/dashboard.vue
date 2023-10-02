<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <router-link to="/" class="navbar-brand" href="#">Remittance Calculator</router-link>
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link exact-active-class="active" to="/companyRate" class="nav-item nav-link">View Company Rates</router-link>
                    <router-link exact-active-class="active" to="/changePassword" class="nav-item nav-link">Change Password</router-link>
                </div>
            </div>
        </div>
    </nav>

    <router-view></router-view>
</template>

<script setup>
import { RouterLink, RouterView } from "vue-router";

</script>
