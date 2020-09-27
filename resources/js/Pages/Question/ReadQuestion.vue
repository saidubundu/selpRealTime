<template>
    <app-home>
        <main id="tt-pageContent">
            <div class="container">
                <div v-if="question">
                    <div class="tt-single-topic-list">
                        <show-question :auth="auth_user" :data="question"></show-question>
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
                        <question-replies :auth="auth_user" :question="question"></question-replies>
                    </div>
                    <div class="tt-wrapper-inner">
                        <h4 class="tt-title-separator"><span>You’ve reached the end of replies</span></h4>
                    </div>
                    <div class="tt-topic-list" v-if="!$page.auth.user.loggedIn">
                        <div class="tt-item tt-item-popup">
                            <div class="tt-col-message">
                                Looks like you are new here. Register for free, learn and contribute.
                            </div>
                            <div class="tt-col-btn">
                                <a href="/login">
                                    <button type="button" class="btn btn-primary">Log in</button>
                                </a>
                                <a href="/register" class="m-2">
                                    <button type="button" class="btn btn-secondary">Sign up</button>
                                </a>
                                <button type="button" class="btn-icon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-cancel"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <create-reply :questionSlug="question.data.slug"></create-reply>
                    <div class="tt-topic-list tt-ofset-30">
                        <div class="tt-list-search">
                            <div class="tt-title">Suggested Topics</div>
                            <!-- tt-search -->
                            <div class="tt-search">
                                <form class="search-wrapper">
                                    <div class="search-form">
                                        <input type="text" class="tt-search__input" placeholder="Search for topics">
                                        <button class="tt-search__btn" type="submit">
                                            <svg class="tt-icon">
                                                <use xlink:href="#icon-search"></use>
                                            </svg>
                                        </button>
                                        <button class="tt-search__close">
                                            <svg class="tt-icon">
                                                <use xlink:href="#icon-cancel"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- /tt-search -->
                        </div>
                        <div class="tt-list-header tt-border-bottom">
                            <div class="tt-col-topic">Topic</div>
                            <div class="tt-col-category">Category</div>
                            <div class="tt-col-value hide-mobile">Likes</div>
                            <div class="tt-col-value hide-mobile">Replies</div>
                            <div class="tt-col-value hide-mobile">Views</div>
                            <div class="tt-col-value">Activity</div>
                        </div>
                        <div class="tt-item">
                            <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-ava-n"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                                <h6 class="tt-title"><a href="#">
                                    Does Envato act against the authors of Envato markets?
                                </a></h6>
                                <div class="row align-items-center no-gutters hide-desktope">
                                    <div class="col-11">
                                        <ul class="tt-list-badge">
                                            <li class="show-mobile"><a href="#"><span
                                                class="tt-color05 tt-badge">music</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-1 ml-auto show-mobile">
                                        <div class="tt-value">1d</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-col-category"><span class="tt-color05 tt-badge">music</span></div>
                            <div class="tt-col-value hide-mobile">358</div>
                            <div class="tt-col-value tt-color-select hide-mobile">68</div>
                            <div class="tt-col-value hide-mobile">8.3k</div>
                            <div class="tt-col-value hide-mobile">1d</div>
                        </div>
                        <div class="tt-item">
                            <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-ava-h"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                                <h6 class="tt-title"><a href="#">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-locked"></use>
                                    </svg>
                                    We Want to Hear From You! What Would You Like?
                                </a></h6>
                                <div class="row align-items-center no-gutters hide-desktope">
                                    <div class="col-11">
                                        <ul class="tt-list-badge">
                                            <li class="show-mobile"><a href="#"><span
                                                class="tt-color06 tt-badge">movies</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-1 ml-auto show-mobile">
                                        <div class="tt-value">2d</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-col-category"><span class="tt-color06 tt-badge">movies</span></div>
                            <div class="tt-col-value hide-mobile">674</div>
                            <div class="tt-col-value tt-color-select  hide-mobile">29</div>
                            <div class="tt-col-value hide-mobile">1.3k</div>
                            <div class="tt-col-value hide-mobile">2d</div>
                        </div>
                        <div class="tt-item">
                            <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-ava-j"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                                <h6 class="tt-title"><a href="#">
                                    Seeking partner backend developer
                                </a></h6>
                                <div class="row align-items-center no-gutters">
                                    <div class="col-11">
                                        <ul class="tt-list-badge">
                                            <li class="show-mobile"><a href="#"><span class="tt-color03 tt-badge">exchange</span></a>
                                            </li>
                                            <li><a href="#"><span class="tt-badge">themeforest</span></a></li>
                                            <li><a href="#"><span class="tt-badge">elements</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-1 ml-auto show-mobile">
                                        <div class="tt-value">2d</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-col-category"><span class="tt-color13 tt-badge">movies</span></div>
                            <div class="tt-col-value hide-mobile">278</div>
                            <div class="tt-col-value tt-color-select  hide-mobile">27</div>
                            <div class="tt-col-value hide-mobile">1.4k</div>
                            <div class="tt-col-value hide-mobile">2d</div>
                        </div>
                        <div class="tt-item">
                            <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-ava-t"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                                <h6 class="tt-title"><a href="#">
                                    Cannot customize my intro
                                </a></h6>
                                <div class="row align-items-center no-gutters">
                                    <div class="col-11">
                                        <ul class="tt-list-badge">
                                            <li class="show-mobile"><a href="#"><span class="tt-color07 tt-badge">video games</span></a>
                                            </li>
                                            <li><a href="#"><span class="tt-badge">videohive</span></a></li>
                                            <li><a href="#"><span class="tt-badge">photodune</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-1 ml-auto show-mobile">
                                        <div class="tt-value">2d</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-col-category"><span class="tt-color07 tt-badge">video games</span></div>
                            <div class="tt-col-value hide-mobile">364</div>
                            <div class="tt-col-value tt-color-select  hide-mobile">36</div>
                            <div class="tt-col-value  hide-mobile">982</div>
                            <div class="tt-col-value hide-mobile">2d</div>
                        </div>
                        <div class="tt-item">
                            <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-ava-k"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                                <h6 class="tt-title"><a href="#">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-verified"></use>
                                    </svg>
                                    Microsoft Word and Power Point
                                </a></h6>
                                <div class="row align-items-center no-gutters hide-desktope">
                                    <div class="col-11">
                                        <ul class="tt-list-badge">
                                            <li class="show-mobile"><a href="#"><span class="tt-color08 tt-badge">youtube</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-1 ml-auto show-mobile">
                                        <div class="tt-value">3d</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-col-category"><span class="tt-color08 tt-badge">youtube</span></div>
                            <div class="tt-col-value  hide-mobile">698</div>
                            <div class="tt-col-value tt-color-select  hide-mobile">78</div>
                            <div class="tt-col-value  hide-mobile">2.1k</div>
                            <div class="tt-col-value hide-mobile">3d</div>
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
        </main>
    </app-home>
</template>

<script>
    import AppHome from "../../Layouts/AppHome";
    import ShowQuestion from "./ShowQuestion";
    import QuestionReplies from "../Reply/QuestionReplies";
    import EditQuestion from "./EditQuestion";
    import CreateReply from "../Reply/CreateReply";

    export default {
        name: "ReadQuestion",
        components: {CreateReply, EditQuestion, QuestionReplies, ShowQuestion, AppHome},
        props: ['question', 'auth_user', 'can'],

        data() {
            return {
                loggedIn: this.auth_user,
            }
        },
    }
</script>

<style scoped>

</style>
