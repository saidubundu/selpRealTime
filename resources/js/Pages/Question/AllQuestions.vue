<template>
    <div class="tt-item">
        <inertia-link :href="$route('user.show', data.user_id)">
        <div class="tt-col-avatar">
            <svg class="tt-icon">
                <use :xlink:href="classes"></use>
            </svg>
        </div>
        </inertia-link>
        <div class="tt-col-description">
            <h6 class="tt-title"><inertia-link :href="$route('question.show', data.slug)">
                {{data.title}}
            </inertia-link></h6>
            <div class="row align-items-center no-gutters">
                <div class="col-11">
                    <ul class="tt-list-badge">
                        <li class="show-mobile"><a href="#"><span :class="categoryClass">{{data.category}}</span></a></li>
                        <li><a v-if="solved" href="#"><span class="tt-badge">Solved</span></a></li>

                    </ul>
                </div>
                <div class="col-1 ml-auto show-mobile">
                    <div class="tt-value">1d</div>
                </div>
            </div>
        </div>
        <div class="tt-col-category"><span :class="categoryClass">{{data.category}}</span></div>
        <div class="tt-col-value tt-color-select  hide-mobile">{{data.reply_count}}</div>
        <div class="tt-col-value  hide-mobile">{{data.views}}</div>
        <div class="tt-col-value hide-mobile">{{data.created}}</div>
    </div>
</template>

<script>
    export default {
        name: "AllQuestions",
        props:['data'],

        computed:{
            classes(){
                return '#icon-ava-' + this.data.author[0].toLowerCase()
            },

            categoryClass(){

                    return `tt-color0${this.data.category_id} tt-badge`


            },

            solved(){
                return this.data.best_reply
            }
        },
    }
</script>

<style scoped>

</style>
