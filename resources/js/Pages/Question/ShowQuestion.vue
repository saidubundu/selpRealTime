<template>
    <div class="tt-single-topic-list">
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
                            <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i>{{data.data.created}}
                        </a>
                    </div>
                    <h3 class="tt-item-title">
                        <a href="#">{{data.data.title}}</a>
                    </h3>
                    <div class="tt-item-tag">
                        <ul class="tt-list-badge">
                            <li><a href="#"><span :class="categoryClass">{{data.data.category}}</span></a></li>
                            <li><a v-if="solved" href="#"><span class="tt-badge">Solved</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="tt-item-description">
                    {{data.data.body}}
                </div>
                <div class="tt-item-info info-bottom">
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
        <div class="tt-item">
            <div class="tt-info-box">
                <h6 class="tt-title">Thread Status</h6>
                <div class="tt-row-icon">
                    <div class="tt-item">
                        <a href="#" class="tt-icon-btn tt-position-bottom">
                            <i class="tt-icon">
                                <svg>
                                    <use xlink:href="#icon-reply"></use>
                                </svg>
                            </i>
                            <span class="tt-text">283</span>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class="tt-icon-btn tt-position-bottom">
                            <i class="tt-icon">
                                <svg>
                                    <use xlink:href="#icon-view"></use>
                                </svg>
                            </i>
                            <span class="tt-text">10.5k</span>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class="tt-icon-btn tt-position-bottom">
                            <i class="tt-icon">
                                <svg>
                                    <use xlink:href="#icon-user"></use>
                                </svg>
                            </i>
                            <span class="tt-text">168</span>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class="tt-icon-btn tt-position-bottom">
                            <i class="tt-icon">
                                <svg>
                                    <use xlink:href="#icon-like"></use>
                                </svg>
                            </i>
                            <span class="tt-text">2.4k</span>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class="tt-icon-btn tt-position-bottom">
                            <i class="tt-icon">
                                <svg>
                                    <use xlink:href="#icon-favorite"></use>
                                </svg>
                            </i>
                            <span class="tt-text">951</span>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class="tt-icon-btn tt-position-bottom">
                            <i class="tt-icon">
                                <svg>
                                    <use xlink:href="#icon-share"></use>
                                </svg>
                            </i>
                            <span class="tt-text">32</span>
                        </a>
                    </div>
                </div>
                <hr>
                <h6 class="tt-title">Frequent Posters</h6>
                <div class="tt-row-icon">
                    <div class="tt-item">
                        <a href="#" class=" tt-icon-avatar">
                            <svg>
                                <use xlink:href="#icon-ava-d"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class=" tt-icon-avatar">
                            <svg>
                                <use xlink:href="#icon-ava-t"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class=" tt-icon-avatar">
                            <svg>
                                <use xlink:href="#icon-ava-k"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class=" tt-icon-avatar">
                            <svg>
                                <use xlink:href="#icon-ava-n"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class=" tt-icon-avatar">
                            <svg>
                                <use xlink:href="#icon-ava-a"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class=" tt-icon-avatar">
                            <svg>
                                <use xlink:href="#icon-ava-c"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class=" tt-icon-avatar">
                            <svg>
                                <use xlink:href="#icon-ava-h"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row-object-inline form-default">
                    <h6 class="tt-title">Sort replies by:</h6>
                    <ul class="tt-list-badge tt-size-lg">
                        <li><a href="#"><span class="tt-badge">Recent</span></a></li>
                        <li><a href="#"><span class="tt-color02 tt-badge">Most Liked</span></a></li>
                        <li><a href="#"><span class="tt-badge">Longest</span></a></li>
                        <li><a href="#"><span class="tt-badge">Shortest</span></a></li>
                        <li><a href="#"><span class="tt-badge">Accepted Answers</span></a></li>
                    </ul>
                    <select class="tt-select form-control">
                        <option value="Recent">Recent</option>
                        <option value="Most Liked">Most Liked</option>
                        <option value="Longest">Longest</option>
                        <option value="Shortest">Shortest</option>
                        <option value="Accepted Answer">Accepted Answer</option>
                    </select>
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
                watchers: this.data.data.watchers
                //canEdit: this.can.edit_question,
                //canDelete: this.can.delete_question
            }
        },

        computed:{
            watcher(){
                for(var i=0; i < this.watchers.length; i++) {
                    if (this.auth.id === this.watchers[i].user_id) {
                        return 'true';
                    }
                    else {
                        return 'false'
                    }
                }
            },

            classes(){
                return '#icon-ava-' + this.user[0].toLowerCase()
            },

            canEdit(){
                return this.auth.id === this.data.data.user_id
            },

            canDelete(){
                return this.auth.id === this.data.data.user_id && this.data.data.reply_count < 1;
            },

            categoryClass(){

                return `tt-color0${this.data.data.category_id} tt-badge`

            },

            solved(){
                return this.data.data.best_reply
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
