<template>
    <div class="tt-single-topic-list">
        <reply v-if="question" v-for="(reply, index) in content" :key="reply.id" :index="index" :data="reply" :user="auth"></reply>
    </div>
</template>

<script>
    import Reply from "./Reply";
    export default {
        name: "QuestionReplies",
        components: {Reply},
        props:['question', 'auth'],
        data(){
            return{
                content: this.question.data.replies,
                auth_user: this.auth.user
            }
        },

        created() {
            this.listen()
        },

        methods:{
            listen(){
                EventBus.$on('createReply', (reply) => {
                    this.content.unshift(reply)
                })

                EventBus.$on('deleteReply', (index) => {
                    this.$inertia.delete(`/question/${this.question.data.slug}/reply/${this.content[index].id}`)
                        .then(res => {
                            this.content.splice(index,1)
                            this.$toast.success("Reply deleted", "Success", {timeout: 3000});
                        })
                })
            }
        }
    }
</script>

<style scoped>

</style>
