<template>
    <div>
        <nav class="panel-menu" id="mobile-menu">
            <ul>

            </ul>
            <div class="mm-navbtn-names">
                <div class="mm-closebtn">
                    Close
                    <div class="tt-icon">
                        <svg>
                            <use xlink:href="#icon-cancel"></use>
                        </svg>
                    </div>
                </div>
                <div class="mm-backbtn">Back</div>
            </div>
        </nav>
        <header id="tt-header">
            <div class="container">
                <div class="row tt-row no-gutters">
                    <div class="col-auto">
                        <!-- toggle mobile menu -->
                        <a class="toggle-mobile-menu" href="">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-menu_icon"></use>
                            </svg>
                        </a>
                        <!-- /toggle mobile menu -->
                        <!-- logo -->
                        <div class="tt-logo">
                            <a href="/"><img src="images/logo.png" alt=""></a>
                        </div>
                        <!-- /logo -->
                        <!-- desctop menu -->
                        <div class="tt-desktop-menu">
                            <nav>
                                <ul>
                                    <li><a href="/"><span>Home</span></a></li>
                                    <li><inertia-link href="/question"><span>Discussions</span></inertia-link></li>
                                    <li><inertia-link  :href="$route('question.create')"><span>Create</span></inertia-link></li>
                                    <li><inertia-link href="/about"><span>About</span></inertia-link></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- /desctop menu -->
                        <!-- tt-search -->
                        <search-component></search-component>
                        <!-- /tt-search -->
                    </div>

                    <div class="col-auto ml-auto">
                        <div class="tt-account-btn" v-if="!$page.auth.user.loggedIn">
                            <a href="/login" class="btn btn-primary">Log in</a>
                            <a href="/register" class="btn btn-secondary">Sign up</a>
                        </div>
                        <div v-else class="tt-user-info d-flex justify-content-center">
                            <a href="#" id="js-settings-btn" class="tt-btn-icon">
                                <i class="tt-icon"><svg><use xlink:href="#icon-notification"></use></svg></i>
                            </a>
                            <inertia-link :href="$route('user.show', auth_user.id)">
                            <div class="tt-avatar-icon tt-size-md">
                                <i class="tt-icon"><svg><use :xlink:href="classes"></use></svg></i>
                            </div>
                            </inertia-link>
<!--                            <div class="mt-2 tt-item ">-->
<!--                                <span class="tt-col-value  hide-mobile">-->
<!--                                    <p >{{ auth_user.name }}</p>-->
<!--                                </span>-->
<!--                            </div>-->

<!--                            <div class="custom-select-01">-->
<!--                                <select>-->
<!--                                    <option value="Default Sorting">azyrusmax</option>-->
<!--                                    <option value="value 01">value 01</option>-->
<!--                                    <option value="value 02">value 02</option>-->
<!--                                </select>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
</template>

<script>
    import JetApplicationLogo from "../../Jetstream/ApplicationLogo";
    import JetApplicationMark from "../../Jetstream/ApplicationMark";
    import JetDropdown from "../../Jetstream/Dropdown";
    import JetDropdownLink from "../../Jetstream/DropdownLink";
    import JetNavLink from "../../Jetstream/NavLink";
    import JetResponsiveNavLink from "../../Jetstream/ResponsiveNavLink";
    import SearchComponent from "./SearchComponent";
    import AppNotification from "./AppNotification";

    export default {
        name: "ToolBar",
        props:['auth_user'],
        components: {
            AppNotification,
            SearchComponent,
            JetApplicationLogo,
            JetApplicationMark,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
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
            classes(){
                return '#icon-ava-' + this.auth_user.name[0].toLowerCase()
            },
            path() {
                return window.location.pathname
            }
        }
    }
</script>

<style scoped>

</style>
