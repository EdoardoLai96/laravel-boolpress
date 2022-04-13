import Vue from 'vue';

import VueRouter from 'vue-router';

 Vue.use(VueRouter);

 import Home from './pages/Home';
 import Posts from './pages/Posts';
 import Post from '../js/partials/Post';
 import NotFound from './pages/NotFound';
 
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
            {
                path: '/:pathMatch(.*)*',
                name: 'not-found',
                component: NotFound
            }
        ]
    });
    
    export default router
