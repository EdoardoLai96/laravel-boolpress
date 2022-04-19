<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Scrivici una mail</h1>
                <form @submit.prevent="sendForm">

                    <div v-if="success" class="alert alert-success">
                        Email inviata con successo!!
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" class="form-control" :class="{'is-invalid':errors.name}" id="name" name="name" v-model="name">
                        <p v-for="(error, index) in errors.name" :key="'error_name'+index" class="invalid-feedback">
                            {{error}}
                        </p>                    
                    </div>


                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" :class="{'is-invalid':errors.email}" id="email" name="email" v-model="email">
                        <p v-for="(error, index) in errors.email" :key="'error_email'+index" class="invalid-feedback">
                            {{error}}
                        </p>                    

                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Scrivi un messaggio:</label>
                        <textarea class="form-control" id="message" :class="{'is-invalid':errors.message}" name="message" v-model="message"></textarea>
                        <p v-for="(error, index) in errors.message" :key="'error_message'+index" class="invalid-feedback">
                            {{error}}
                        </p>                    

                    </div>

                    <button type="submit" class="btn btn-primary">{{isSending?'Invio in corso...':'Invia' }}</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       name: 'Contact',
       components: { 

       },
       data() {
           return{
            name: "",
            email: "",
            message: "",
            isSending: false,
            errors: {},
            success : false
         }
       },
       methods: {
           sendForm(){
               this.isSending = true;

               axios.post("/api/contacts",{
                   "name": this.name,
                   "email": this.email,
                   "message": this.message,
               }).then(response =>{
                   
                   this.isSending = false;

                   if(response.data.errors){
                       this.errors = response.data.errors;
                       this.success = false;
                   }else{
                       this.success = true;

                        this.name = '';
                        this.email = '';
                        this.message = '';
                        this.errors = {};
                   }
                       console.log(response)
               });
           }
       },
    };
</script>
