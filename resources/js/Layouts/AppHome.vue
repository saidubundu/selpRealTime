<template>

    <div>
        <tool-bar :auth_user="auth_user"></tool-bar>
        <main>
            <slot></slot>
        </main>

        <app-notification :auth_user="auth_user"></app-notification>
        <inertia-link :href="$route('question.create')" class="tt-btn-create-topic">
    <span class="tt-icon">
        <svg>
          <use xlink:href="#icon-create_new"></use>
        </svg>
    </span>
        </inertia-link>
        <div class="modal fade" id="modalAdvancedSearch" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="tt-modal-advancedSearch">
                        <div class="tt-modal-title">
                            <i class="pt-icon">
                                <svg>
                                    <use xlink:href="#icon-advanced_search"></use>
                                </svg>
                            </i>
                            Advanced Search
                            <a class="pt-close-modal" href="#" data-dismiss="modal">
                                <svg class="icon">
                                    <use xlink:href="#icon-cancel"></use>
                                </svg>
                            </a>
                        </div>
                        <form class="form-default">
                            <div class="form-group">
                                <i class="pt-customInputIcon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-search"></use>
                                    </svg>
                                </i>
                                <input type="text" name="name" class="form-control pt-customInputSearch" id="searchForum" placeholder="Search all forums">
                            </div>
                            <div class="form-group">
                                <label for="searchName">Posted by</label>
                                <input type="text" name="name" class="form-control" id="searchName" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="searchCategory">In Category</label>
                                <input type="text" name="name" class="form-control" id="searchCategory" placeholder="Add Category">
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" id="searcCheckBox01" name="checkbox">
                                <label for="searcCheckBox01">
                                    <span class="check"></span>
                                    <span class="box"></span>
                                    <span class="tt-text">Include all tags</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Only return topics/posts that...</label>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="searcCheckBox02" name="checkbox">
                                    <label for="searcCheckBox02">
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        <span class="tt-text">I liked</span>
                                    </label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="searcCheckBox03" name="checkbox">
                                    <label for="searcCheckBox03">
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        <span class="tt-text">are in my messages</span>
                                    </label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="searcCheckBox04" name="checkbox">
                                    <label for="searcCheckBox04">
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        <span class="tt-text">I’ve read</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="searchTop">
                                    <option>any</option>
                                    <option>value 01</option>
                                    <option>value 02</option>
                                    <option>value 03</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="searchaTopics">Where topics</label>
                                <select class="form-control" id="searchaTopics">
                                    <option>any</option>
                                    <option>value 01</option>
                                    <option>value 02</option>
                                    <option>value 03</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="searchAdvTime">Posted</label>
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-control">
                                            <option>any</option>
                                            <option>value 01</option>
                                            <option>value 02</option>
                                            <option>value 03</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="name" class="form-control" id="searchAdvTime" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="minPostCount">Minimum Post Count</label>
                                <select class="form-control" id="minPostCount">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option selected>10</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <a href="#" class="btn btn-secondary btn-block">Search</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import ToolBar from "../Pages/Partials/ToolBar";
    import UserSettings from "../Pages/User/UserSettings";
    import AppNotification from "../Pages/Partials/AppNotification";

    export default {
        name: "AppHome",
        components: {
            AppNotification,
            UserSettings,
            ToolBar,
        },
        props:['auth_user'],
        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put('/current-team', {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                axios.post('/logout').then(response => {
                    window.location = '/';
                })
            },
        },

        computed: {
            path() {
                return window.location.pathname
            }
        }
    }
</script>

<style scoped>

</style>
