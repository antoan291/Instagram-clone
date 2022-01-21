<template>
    <div>
         <!-- <button class="btn btn-primary" @click="followUser" v-text="buttonText"></button> -->
         <button :class="buttonClass" id="like" @click='likePost'>
            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
            </svg>
        </button>

    </div>
</template>

<script>
    export default {
        props: ['postId', 'likes'],
        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                status: this.likes, 
            }
        },
        methods: {
           likePost() {
               axios.post('/like/' + this.postId)
                    .then(response => {
                        this.status = ! this.status;
                        console.log(response.data);
                    });
           } 
        },
        computed: {
            buttonClass() {
                return (this.status) ? 'default' : 'clicked';
            }
        }
      
    }
</script>

<style lang="scss">
.default {
    background: none;
    border: none;
    padding: 0;
    outline: inherit;
    cursor: pointer;
    outline: none;
    color: #bb2e2e;
}
.clicked {
    background: none;
    border: none;
    padding: 0;
    outline: inherit;
    cursor: pointer;
    outline: none;
}
#like:focus {
    outline: none;
}
</style>