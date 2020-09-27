<template>
    <div class="tt-item">
        <div class="tt-single-topic">
            <div class="tt-item-header pt-noborder">
                <div class="tt-item-info info-top">
                    <div class="tt-avatar-icon">
                        <i class="tt-icon"><svg><use :xlink:href="classes"></use></svg></i>
                    </div>
                    <div class="tt-avatar-title">
                        <a href="#">{{data.user}}</a>
                        <span v-if="marked" class="tt-color13 tt-badge">best answer</span>
                    </div>
                    <a href="#" class="tt-info-time">
                        <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i>{{data.created}}
                    </a>
                </div>
            </div>
            <div v-if="editing" class="tt-item-description">
                <edit-reply :reply="data"></edit-reply>
            </div>
            <div v-else class="tt-item-description">
                {{data.reply}}
            </div>
            <div class="tt-item-info info-bottom">
<!--                <a href="#" class="tt-icon-btn">-->
<!--                    <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>-->
<!--                    <span class="tt-text">671</span>-->
<!--                </a>-->
                <mark-as-best v-if="canMark" :content="data"></mark-as-best>
                <like-component :content="data"></like-component>
                <div class="col-separator"></div>
                <div v-if="!editing">
                    <span v-if="canEdit" @click="edit" style="color: Dodgerblue; font-size: 1em;"  class="tt-icon-btn tt-hover-02 tt-small-indent">
                    <i class="fas fa-edit"></i>
                </span>
                    <span v-if="canDelete" @click="destroy"  style="color: Tomato; font-size: 1em;"  class="tt-icon-btn tt-hover-02 tt-small-indent">
                    <i class="fas fa-trash" ></i>
                </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import EditReply from "./EditReply";
    import LikeComponent from "../Partials/LikeComponent";
    import MarkAsBest from "../Partials/MarkAsBest";
    export default {
        name: "Reply",
        components: {MarkAsBest, LikeComponent, EditReply},
        props:['data', 'index', 'user'],

        data(){
          return{
              editing: false,
              beforeEditReplyBody: '',
              marked: this.data.best_reply === this.data.id
          }
        },

        created() {
            this.listen()
        },

        computed:{
            classes(){
                return '#icon-ava-' + this.data.user[0].toLowerCase()
            },

            canMark(){
                if (this.user){
                    return this.user.id === this.data.question_user
                }
            },

            canEdit(){
               if(this.user){
                   return this.user.id == this.data.user_id
               }
            },

            canDelete(){
                if(this.user){
                    return this.user.id == this.data.user_id
                }
            }
        },

        methods:{
            destroy(){
                this.$toast.question('Are you sure about that?', "Confirm", {
                    timeout: 20000,
                    close: false,
                    overlay: true,
                    displayMode: 'once',
                    id: 'question',
                    zindex: 999,
                    title: 'Hey',
                    position: 'center',
                    buttons: [
                        ['<button><b>YES</b></button>', (instance, toast) => {
                            EventBus.$emit('deleteReply', this.index)

                            instance.hide({transitionOut: 'fadeOut'}, toast, 'button');

                        }, true],
                        ['<button>NO</button>', function (instance, toast) {

                            instance.hide({transitionOut: 'fadeOut'}, toast, 'button');

                        }],
                    ],
                });

            },
            edit(){
                this.editing = true
                this.beforeEditReplyBody = this.data.reply
            },

            listen(){
               EventBus.$on('cancelEditing', (reply) => {
                    this.editing = false
                    if(reply !== this.data.reply){
                        this.data.reply = this.beforeEditReplyBody
                        this.beforeEditReplyBody = ''
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
