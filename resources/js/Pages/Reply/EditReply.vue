<template>
    <div class="tt-wrapper-inner">
        <div class="pt-editor form-default">
            <h6 class="pt-title">Post Your Reply</h6>
            <div class="pt-row">
                <div class="col-left">
                    <ul class="pt-edit-btn">
                        <li><button type="button" class="btn-icon">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-quote"></use>
                            </svg>
                        </button></li>
                        <li><button type="button" class="btn-icon">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-bold"></use>
                            </svg>
                        </button></li>
                        <li><button type="button" class="btn-icon">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-italic"></use>
                            </svg>
                        </button></li>
                        <li><button type="button" class="btn-icon">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-share_topic"></use>
                            </svg>
                        </button></li>
                        <li><button type="button" class="btn-icon">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-blockquote"></use>
                            </svg>
                        </button></li>
                        <li><button type="button" class="btn-icon">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-performatted"></use>
                            </svg>
                        </button></li>
                        <li class="hr"></li>
                        <li><button type="button" class="btn-icon">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-upload_files"></use>
                            </svg>
                        </button></li>
                        <li><button type="button" class="btn-icon">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-bullet_list"></use>
                            </svg>
                        </button></li>
                        <li><button type="button" class="btn-icon">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-heading"></use>
                            </svg>
                        </button></li>
                        <li><button type="button" class="btn-icon">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-horizontal_line"></use>
                            </svg>
                        </button></li>
                        <li><button type="button" class="btn-icon">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-emoticon"></use>
                            </svg>
                        </button></li>
                        <li><button type="button" class="btn-icon">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-settings"></use>
                            </svg>
                        </button></li>
                        <li><button type="button" class="btn-icon">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-color_picker"></use>
                            </svg>
                        </button></li>
                    </ul>
                </div>
                <div class="col-right tt-hidden-mobile">
                    <a href="#" class="btn btn-primary">Preview</a>
                </div>
            </div>
            <div class="form-group">
                <textarea v-model="reply.reply" name="message" class="form-control" rows="5" placeholder="Lets get started"></textarea>
            </div>
            <div class="pt-row">
                <div class="col-auto">
                    <div class="checkbox-group">
                        <input type="checkbox" id="checkBox21" name="checkbox" checked="">
                        <label for="checkBox21">
                            <span class="check"></span>
                            <span class="box"></span>
                            <span class="tt-text">Subscribe to this topic.</span>
                        </label>
                    </div>
                </div>
                <div class="col-auto">
                     <span @click="update" style="color: Dodgerblue; font-size: 1em;"  class="tt-icon-btn tt-hover-02 tt-small-indent">
                    <i class="fas fa-check-double"></i>
                </span>
                    <span @click="cancel"  style="color: Tomato; font-size: 1em;"  class="tt-icon-btn tt-hover-02 tt-small-indent">
                    <i class="fas fa-times-circle" ></i>
                </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "EditReply",
        props:['reply'],
        data(){
            return{

            }
        },

        methods:{
            update(){
                this.$inertia.patch(`/question/${this.reply.question_slug}/reply/${this.reply.id}`, {body: this.reply.reply})
                .then(res => {
                    this.$toast.success('Reply Updated', "Success", {timeout: 3000});
                    this.cancel(this.reply.reply)
                })
            },

            cancel(reply){
                EventBus.$emit('cancelEditing', reply)
            }
        }
    }
</script>

<style scoped>

</style>
