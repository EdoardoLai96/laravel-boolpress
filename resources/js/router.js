import Vue from 'vue';

import VueRouter from 'vue-router';

 Vue.use(VueRouter);

 import Home from './pages/Home';
 import Posts from './pages/Posts';
 
 const router = new VueRouter({
     mode: 'history',
     routes : [
            {
             path: '/',
             name: 'home',
             component: Home
            },
            {
             path: '/posts',
             name: 'posts',
             component: Posts
            },
        ]
    });
    
    export default router
