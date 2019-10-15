<template>
    <div class="container">
        <button  v-text="buttonText" class="btn btn-primary" @click="followUser">follow</button>
    </div>
</template>

<script>
    export default {
        props: ['userid', 'follows'],
        mounted() {
            console.log('Component mounted.')
        }, 

        data: function () {
           return {
               status : this.follows
           };
        },

        methods : {
             followUser () {
                 axios.post('/follow/'+this.userid)
                 .then(response=>{
                     this.status = !this.status;
                     console.log(response);
                 }).catch(errors=>{
                     if(errors.response.status == 401) {
                         console.log(errors)
                         window.location = '/login'
                     }
                 });
             }
        }, 
        computed: {
            buttonText () {
                return(this.status)?'Unfollow':'Follow';
            }
        }
    }
</script>
