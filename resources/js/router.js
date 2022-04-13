import Vue from 'vue';

import VueRouter from 'vue-router';

 Vue.use(VueRouter);

 import Home from './pages/Home';
 import Posts from './pages/Posts';
 import Post from '../js/partials/Post';
 
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
            {
             path: '/posts/:slug',
             name: 'post',
             component: Post
            },
        ]
    });
    
    export default router
