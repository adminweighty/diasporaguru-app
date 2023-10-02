/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web mainlications using Vue and Laravel.
 */

import './bootstrap';
import {createApp} from 'vue';

/**
 * Next, we will create a fresh Vue mainlication instance. You may then begin
 * registering components with the mainlication instance so they are ready
 * to use in your mainlication's views. An example is included for you.
 */

const main = createApp({});


import DashboardComponent from './components/dashboard.vue';
main.component('dashboard-component', DashboardComponent);

import {routes} from './components/routes';
import { createRouter,createWebHistory} from 'vue-router';

const router = createRouter({
    history: createWebHistory(),
   routes
})

main.use(router);
//router.isReady().then(() => main.mount('#main'))
// Note: on Server Side, you need to manually push the initial location
router.isReady().then(() =>main.mount('#main'))
