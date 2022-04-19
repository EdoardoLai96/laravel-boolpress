<template>
     <header>
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Boolpress</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link :to="{name:'home'}" class="nav-link" aria-current="page" href="#">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name:'posts'}" class="nav-link" aria-current="page" href="#">Posts</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name:'contact'}" class="nav-link" aria-current="page" href="#">Contattaci</router-link>
                    </li>
                  
                </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
    export default {
       name: 'Header',
       
    };
</script>

<style scoped lang="scss">
.router-link-exact-active{
    border-bottom: 2px solid rgb(0, 119, 255);
    font-weight: bolder;
    text-transform: uppercase;
    transition: 0.3s;
}
</style>
