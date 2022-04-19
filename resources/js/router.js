
import Vue from 'vue';


import VueRouter from 'vue-router';

 Vue.use(VueRouter);

 import Home from './pages/Home';
 import Posts from './pages/Posts';
 import Post from '../js/partials/Post';
 import NotFound from './pages/NotFound';
 import Contact from './pages/Contact';
 
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
            },
            {
                path: '/contacts',
                name: 'contact',
                component: Contact
            }
        ]
    });
    
    export default router
