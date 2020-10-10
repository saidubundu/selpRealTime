<template>
    <div id="js-popup-settings" class="tt-popup-settings">
        <div class="tt-btn-col-close">
            <a href="#">
                <span class="tt-icon-text">
				Notifications
			</span>
                <span class="tt-icon-close">
				<svg>
					<use xlink:href="#icon-cancel"></use>
				</svg>
			</span>
            </a>
        </div>
            <div class="tt-tab-wrapper">
                <div class="tt-wrapper-inner">
                    <ul class="nav nav-tabs pt-tabs-default" role="tablist">
                        <li class="nav-item show">
                            <a class="nav-link active" data-toggle="tab" href="#tt-tab-01" role="tab"><span>Unread</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tt-tab-02" role="tab"><span>Read</span></a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane tt-indent-none  show active" id="tt-tab-01" role="tabpanel">
                        <div class="tt-topic-list">
                            <div v-if="unread">
                                No new notification
                            </div>
                            <div v-else v-for="item in unread" :key="item.id">
                            <div  class="tt-item">
<!--                                <div class="tt-col-avatar">-->
<!--                                    <svg class="tt-icon">-->
<!--                                        <use xlink:href="#icon-ava-n"></use>-->
<!--                                    </svg>-->
<!--                                </div>-->
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><inertia-link :href="item.path">
                                        <p @click="readIt(item)">{{item.question}}</p>
                                    </inertia-link></h6>
                                    <div class="tt-col-message">
                                        <a href="#">{{item.replyBy}} replied:</a> {{item.reply}}
                                    </div>
<!--                                    <div class="row align-items-center no-gutters hide-desktope">-->
<!--                                        <div class="col-9">-->
<!--                                            <ul class="tt-list-badge">-->
<!--                                                <li class="show-mobile"><a href="#"><span class="tt-color05 tt-badge">music</span></a></li>-->
<!--                                            </ul>-->
<!--                                            <a href="#" class="tt-btn-icon show-mobile">-->
<!--                                                <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>-->
<!--                                            </a>-->
<!--                                        </div>-->
<!--                                        <div class="col-3 ml-auto show-mobile">-->
<!--                                            <div class="tt-value">5 Jan,19</div>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                </div>
<!--                                <div class="tt-col-category tt-col-value-large hide-mobile"><span class="tt-color05 tt-badge">music</span></div>-->
<!--                                <div class="tt-col-value-large hide-mobile">-->
<!--                                    <a href="#" class="tt-btn-icon">-->
<!--                                        <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>-->
<!--                                    </a>-->
<!--                                </div>-->
<!--                                <div class="tt-col-value-large hide-mobile">5 Jan,19</div>-->
                            </div>
                            </div>
                            <div class="tt-row-btn">
                                <button type="button" class="btn-icon js-topiclist-showmore">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-load_lore_icon"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tt-indent-none" id="tt-tab-02" role="tabpanel">
                        <div class="tt-topic-list">
                            <div v-for="item in read" :key="item.id">
                                <div  class="tt-item">
                                    <!--                                <div class="tt-col-avatar">-->
                                    <!--                                    <svg class="tt-icon">-->
                                    <!--                                        <use xlink:href="#icon-ava-n"></use>-->
                                    <!--                                    </svg>-->
                                    <!--                                </div>-->
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><inertia-link :href="item.path">
                                            <p @click="readIt(item)">{{item.question}}</p>
                                        </inertia-link></h6>
                                        <div class="tt-col-message">
                                            <a href="#">{{item.replyBy}} replied:</a> {{item.reply}}
                                        </div>
                                        <!--                                    <div class="row align-items-center no-gutters hide-desktope">-->
                                        <!--                                        <div class="col-9">-->
                                        <!--                                            <ul class="tt-list-badge">-->
                                        <!--                                                <li class="show-mobile"><a href="#"><span class="tt-color05 tt-badge">music</span></a></li>-->
                                        <!--                                            </ul>-->
                                        <!--                                            <a href="#" class="tt-btn-icon show-mobile">-->
                                        <!--                                                <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>-->
                                        <!--                                            </a>-->
                                        <!--                                        </div>-->
                                        <!--                                        <div class="col-3 ml-auto show-mobile">-->
                                        <!--                                            <div class="tt-value">5 Jan,19</div>-->
                                        <!--                                        </div>-->
                                        <!--                                    </div>-->
                                    </div>
                                    <!--                                <div class="tt-col-category tt-col-value-large hide-mobile"><span class="tt-color05 tt-badge">music</span></div>-->
                                    <!--                                <div class="tt-col-value-large hide-mobile">-->
                                    <!--                                    <a href="#" class="tt-btn-icon">-->
                                    <!--                                        <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>-->
                                    <!--                                    </a>-->
                                    <!--                                </div>-->
                                    <!--                                <div class="tt-col-value-large hide-mobile">5 Jan,19</div>-->
                                </div>
                            </div>
                            <div class="tt-row-btn">
                                <button type="button" class="btn-icon js-topiclist-showmore">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-load_lore_icon"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</template>

<script>
    export default {
        name: "AppNotification",
        props:['auth_user'],
        data(){
            return{
                 read:{},
                 unread: {},
                 unreadCount: 0,
            }
        },

        created() {
            if (this.auth_user){
                this.getNotifications()
            }

        },

        methods:{
            getNotifications(){
                axios.post('/notifications')
                .then(res => {
                    this.read = res.data.read
                     this.unread = res.data.unread
                    this.unreadCount = res.data.unread.length
                })

            },

            readIt(notification) {
                axios.post("/markAsRead", {id: notification.id}).then(res => {
                    this.unread.splice(notification, 1);
                    this.read.push(notification);
                    this.unreadCount--;
                });
            },
        }
    }
</script>

<style scoped>

</style>
