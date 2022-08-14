import Vue from 'vue';
import VueRouter from 'vue-router';

import Charts from './pages/Charts.vue';
import Table from './pages/Table.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'table',
            component: Table
        },
        {
            path: '/charts',
            name: 'charts',
            component: Charts
        },
    ]
});

export default router;