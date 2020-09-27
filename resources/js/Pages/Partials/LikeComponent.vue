<template>
    <span :style="color"  class="tt-icon-btn tt-hover-02 tt-small-indent" @click="likeIt">
        <i class="fas fa-heart" ></i>
        <span class="tt-text">{{count}}</span>
    </span>
</template>

<script>
    export default {
        name: "LikeComponent",
        props:['content'],
        data(){
            return{
                liked: this.content.liked,
                count: this.content.like_count
            }
        },

        computed: {
            color(){
                return this.liked ? 'color: #F44336; font-size: 1.5em;' : 'color: #FFCDD2; font-size: 1.5em;'
            }
        },

        methods:{
            likeIt(){
                this.liked ? this.decr() : this.incr()
                this.liked = !this.liked
            },

            incr(){
                this.$inertia.post(`/like/${this.content.id}`)
                .then(res => this.count++)
            },

            decr(){
                this.$inertia.delete(`/like/${this.content.id}`)
                .then(res => this.count--)
            }
        }
    }
</script>

<style scoped>

</style>
