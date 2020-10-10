<template>
    <div class="tt-item">
        <div class="tt-col-avatar">
            <svg class="tt-icon">
                <use xlink:href="#icon-ava-d"></use>
            </svg>
        </div>
        <div class="tt-col-description">
            <h6 class="tt-title"><a href="#">
                <svg class="tt-icon">
                    <use xlink:href="#icon-pinned"></use>
                </svg>
                {{data.body}}
            </a></h6>
            <div class="row align-items-center no-gutters">
                <div class="col-11">
                    <ul class="tt-list-badge">
                        <li class="show-mobile"><a href="#"><span class="tt-color01 tt-badge">{{data.category}}</span></a></li>
<!--                        <li><a href="#"><span class="tt-badge">contests</span></a></li>-->
<!--                        <li><a href="#"><span class="tt-badge">authors</span></a></li>-->
                    </ul>
                </div>
                <div class="col-1 ml-auto show-mobile">
                    <div class="tt-value">{{data.created}}</div>
                </div>
            </div>
        </div>
        <div class="tt-col-category"><span class="tt-color01 tt-badge">{{data.category}}</span></div>
        <div class="tt-col-value hide-mobile">985</div>
        <div class="tt-col-value tt-color-select  hide-mobile">{{data.reply_count}}</div>
        <div class="tt-col-value hide-mobile">15.1k</div>
        <div class="tt-col-value hide-mobile">{{data.created}}</div>
    </div>
</template>

<script>
    export default {
        name: "UserQuestions",
        props:['data']
    }
</script>

<style scoped>

</style>
