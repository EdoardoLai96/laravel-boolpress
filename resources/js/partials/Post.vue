<template>
    <div v-if="post" class="card">
            <div class="card-header">
                <h1>{{post.category.name}}</h1>
            </div>
             <img class="card-img-top" :src="post.cover" :alt="post.title">
            <div class="card-body">
            <h5 class="card-title">{{post.name}}</h5>
            <p class="card-text">{{post.content}}</p>
                <router-link :to="{name:'posts'}" class="nav-link btn btn-primary" aria-current="page" href="#">Torna a tutti i post</router-link>
            </div>
        </div>
</template>

<script>
    export default {
       name: 'Post',
       data() {
           return{
            post : null,
            
            
           }
       },
       methods: {
           getPost(){
               // handle success
               
               const slug = this.$route.params.slug;
            // Tutte le rotte che sono dentro api.php iniziano per /api 
            axios.get('/api/posts/' + slug)
            .then((response) => {
                    console.log(response)
                    if(response.data.success == true){
                        this.post = response.data.result;
                    }else{
                        this.$router.push({name: 'not-found'})
                    }
            });
           }
       },
       created(){
           this.getPost();
       }
    };
</script>

<style scoped>
</style>
