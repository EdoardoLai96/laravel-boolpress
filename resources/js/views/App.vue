<template>
<div>

    <Header/>
    <Main/>
</div>
</template>

<script>
    import Main from "../components/Main"
    import Header from "../components/Header"
    import Post from "../partials/Post"

    export default {
       name: 'App',
       components: { 
           Main,
           Header,
           Post,
       }
    }
</script>
