<template>
    <div>
         <button class="btn btn-primary" style="margin-left:25px;" @click="followUser" v-text="buttonText">Follow</button>
    </div>
</template>

<script>
    export default {
        props:['userId','follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data:function(){
            return{
                status:this.follows,
            }
        },

        methods: {
            followUser(){
                axios.post('/follow/' + this.userId)
                .then(response => {
                    this.status = ! this.status;//da smenq follow unfollow bez refresh na stranicata
                    console.log(response.data);
                })
                .catch(errors=>{//ako usera ne e lognat i opita da posledva go preprashta kum login formata
                    if(errors.response.status == 401){
                        window.location = '/login';
                    }
                });
            }
        },

        computed:{
            buttonText(){
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>
