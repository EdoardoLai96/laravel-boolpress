<template>
    <div v-if="post" class="card">
            <div class="card-header">
                <h1>{{post.category.name}}</h1>
            </div>
            <div class="card-body">
            <h5 class="card-title">{{post.name}}</h5>
            <p class="card-text">{{post.content}}</p>
            <a href="#" class="btn btn-primary">Torna a tutte le categorie</a>
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
                    this.post = response.data.result;
            });
           }
       },
       created(){
           this.getPost();
           console.log(this.getPost)
       }
    };
</script>

<style scoped>
</style>
