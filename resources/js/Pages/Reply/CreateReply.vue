<template>
    <div class="tt-wrapper-inner">
        <div class="pt-editor form-default" v-if="$page.auth.user.loggedIn">
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
                <textarea v-model="form.body" name="message" class="form-control" rows="5" placeholder="Lets get started"></textarea>
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
                    <button type="submit" class="btn btn-secondary btn-width-lg"  @click="submit">Reply</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateReply",
        props:['questionSlug'],
        data(){
            return{
                form:{
                    body:null
                }
            }
        },

        methods:{
            submit(){
                this.$inertia.post(`/question/${this.questionSlug}/reply`, this.form)
                .then(res => {
                    this.$toast.success('Reply Posted', "Success", {timeout: 3000});
                    this.form = ''
                    EventBus.$emit('createReply', res.data.reply)
                    window.scrollTo(0,0)
                    console.log(res)
                })
            }
        }
    }
</script>

<style scoped>

</style>
