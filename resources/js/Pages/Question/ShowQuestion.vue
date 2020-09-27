<template>
    <div class="tt-item">
        <div class="tt-single-topic">
            <div class="tt-item-header">
                <div class="tt-item-info info-top">
                    <div class="tt-avatar-icon">
                        <i class="tt-icon"><svg><use :xlink:href="classes"></use></svg></i>
                    </div>
                    <div class="tt-avatar-title">
                        <a href="#">{{data.data.user_name}}</a>
                    </div>
                    <a href="#" class="tt-info-time">
                        <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i>6 Jan,2019
                    </a>
                </div>
                <h3 class="tt-item-title">
                    <a href="#">{{data.data.title}}</a>
                </h3>
                <div class="tt-item-tag">
                    <ul class="tt-list-badge">
                        <li><a href="#"><span class="tt-color03 tt-badge">exchange</span></a></li>
                        <li><a href="#"><span class="tt-badge">themeforest</span></a></li>
                        <li><a href="#"><span class="tt-badge">elements</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="tt-item-description">
                {{data.data.body}}
            </div>
            <div class="tt-item-info info-bottom">
                <a href="#" class="tt-icon-btn">
                    <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
                    <span class="tt-text">671</span>
                </a>
                <a href="#" class="tt-icon-btn">
                    <i class="tt-icon"><svg><use xlink:href="#icon-dislike"></use></svg></i>
                    <span class="tt-text">39</span>
                </a>
                <a href="#" class="tt-icon-btn">
                    <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                    <span class="tt-text">12</span>
                </a>
                <div class="col-separator"></div>
                <div v-if="$page.auth.user.loggedIn">
                <span v-if="canEdit" style="color: Dodgerblue; font-size: 1em;"  class="tt-icon-btn tt-hover-02 tt-small-indent">
                    <inertia-link :href="$route('question.edit', this.slug)">
                    <i class="fas fa-edit"></i>
                        </inertia-link>
                </span>
                <span @click="destroy" v-if="canDelete" style="color: Tomato; font-size: 1em;"  class="tt-icon-btn tt-hover-02 tt-small-indent">
                    <i class="fas fa-trash" ></i>
                </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ShowQuestion",
        props:['data', 'auth'],
        data(){
            return{
                replyCount: this.data.data.reply_count,
                user: this.data.data.user_name,
                slug: this.data.data.slug,
                //canEdit: this.can.edit_question,
                //canDelete: this.can.delete_question
            }
        },

        computed:{
            classes(){
                return '#icon-ava-' + this.user[0].toLowerCase()
            },

            canEdit(){
                return this.auth.user.id === this.data.data.user_id
            },

            canDelete(){
                return this.auth.user.id === this.data.data.user_id && this.data.data.reply_count < 1;
            }

        },

        created() {
          EventBus.$on('createReply', () => {
              this.replyCount ++
          })
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
                            this.$inertia.delete(`/question/${this.data.data.slug}`)
                                .then(res => {
                                    $(this.$el).fadeOut(500, () => {
                                        this.$toast.success("Topic deleted", "Success", {timeout: 3000});
                                    })
                                })
                                .catch(error => console.log(error.response.data))

                            instance.hide({transitionOut: 'fadeOut'}, toast, 'button');

                        }, true],
                        ['<button>NO</button>', function (instance, toast) {

                            instance.hide({transitionOut: 'fadeOut'}, toast, 'button');

                        }],
                    ],
                });
            },

            edit(){
                // EventBus.$emit('startEditing')
            }
        }

    }
</script>

<style scoped>

</style>
