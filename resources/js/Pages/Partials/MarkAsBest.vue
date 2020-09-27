<template>
    <span style="color: blue; font-size: 1.5em;"  class="tt-icon-btn" @click="marked">
        <i class="fas fa-check-double" ></i>
    </span>
</template>

<script>
    export default {
        name: "MarkAsBest",
        props:['content'],

        methods:{
            marked(){
                this.$inertia.post(`/reply/${this.content.id}/accept`)
                .then(res => {
                    this.$toast.success("You\'ve Marked this Answer as Best Answer", "Success", {timeout: 3000});
                })
            }
        }
    }
</script>

<style scoped>

</style>
