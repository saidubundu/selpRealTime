<template>
    <app-home :auth_user="auth_user">
        <main id="tt-pageContent" class="tt-offset-small">
            <div class="container">
                <div class="tt-topic-list">
                    <div class="tt-list-header">
                        <div class="tt-col-topic">Topic</div>
                        <div class="tt-col-category">Category</div>
                        <div class="tt-col-value hide-mobile">Replies</div>
                        <div class="tt-col-value hide-mobile">Views</div>
                        <div class="tt-col-value">Created</div>
                    </div>
                    <div class="tt-topic-alert tt-alert-default" role="alert">
                        <a href="#" target="_blank">4 new posts</a> are added recently, click here to load them.
                    </div>
                    <all-questions v-if="questions" v-for="question in questions" :key="question.path" :data="question"></all-questions>
                    <div class="tt-row-btn">
                        <button type="button" class="btn-icon js-topiclist-showmore">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-load_lore_icon"></use>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </app-home>
</template>

<script>
    import AppHome from "../../Layouts/AppHome";
    import AllQuestions from "./AllQuestions";
    import ToolBar from "../Partials/ToolBar";
    export default {
        name: "Index",
        components: {ToolBar, AllQuestions, AppHome},
        props:['questions', 'auth_user'],

        data(){
            return{
                loggedIn: this.auth_user
            }
        }
    }
</script>

<style scoped>

</style>
