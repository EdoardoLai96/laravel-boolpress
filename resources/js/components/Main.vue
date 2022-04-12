<template>
    <div class="container">
            <h1>Elenco dei Post</h1>
            <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item" :class="(currentPage == 1) ? 'disabled' : '' " ><span @click="getPosts(currentPage - 1)" class="page-link" >Previous</span></li>
                <li class="page-item" :class="(currentPage == lastPage) ? 'disabled' : '' "><span @click="getPosts(currentPage + 1)" class="page-link">Next</span></li>
            </ul>
            </nav>
        <div class="row justify-content-center">
            <div v-for="post in posts" :key="post.id" class="col-3">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">{{post.title}}</h5>
                        <p class="card-text text-truncate">{{post.content}}</p>
                        <a class="btn btn-primary" href="#"> Vedi Post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       name: 'Main',
       components: { 

       },
       data() {
           return{
            posts : [],
            currentPage :  1,
            lastPage: null
           }
       },
       methods: {
           getPosts(apiPage){
            // Tutte le rotte che sono dentro api.php iniziano per /api 
            axios.get('/api/posts', {
                'params':{
                    'page' : apiPage
                }
            })
            .then((response) => {
                // handle success
                this.currentPage = response.data.results.current_page;
                this.lastPage = response.data.results.last_page;
                this.posts = response.data.results.data;
                console.log(response.data)
            });
           }
       },
       created(){
           this.getPosts(1);
           console.log(this.getPosts)
       }
    };
</script>
