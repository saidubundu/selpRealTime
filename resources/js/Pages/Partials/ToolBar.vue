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
                        <a class="toggle-mobile-menu" href="#">
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
                                    <li><a href="#"><span>Trending</span></a></li>
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
                        <div v-else class="hidden sm:flex sm:items-center sm:ml-6">
                            <div class="ml-3 relative">
                                <jet-dropdown align="right" width="48">
                                    <template #trigger>
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                            <img class="h-8 w-8 rounded-full object-cover" :src="$page.user.profile_photo_url" :alt="$page.user.name" />
                                        </button>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Account
                                        </div>

                                        <jet-dropdown-link href="/user/profile">
                                            Profile
                                        </jet-dropdown-link>

                                        <jet-dropdown-link href="/user/api-tokens" v-if="$page.jetstream.hasApiFeatures">
                                            API Tokens
                                        </jet-dropdown-link>

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Team Management -->
                                        <template v-if="$page.jetstream.hasTeamFeatures">
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                Manage Team
                                            </div>

                                            <!-- Team Settings -->
                                            <jet-dropdown-link :href="'/teams/' + $page.user.current_team.id">
                                                Team Settings
                                            </jet-dropdown-link>

                                            <jet-dropdown-link href="/teams/create" v-if="$page.jetstream.canCreateTeams">
                                                Create New Team
                                            </jet-dropdown-link>

                                            <div class="border-t border-gray-100"></div>

                                            <!-- Team Switcher -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                Switch Teams
                                            </div>

                                            <template v-for="team in $page.user.all_teams">
                                                <form @submit.prevent="switchToTeam(team)">
                                                    <jet-dropdown-link as="button">
                                                        <div class="flex items-center">
                                                            <svg v-if="team.id == $page.user.current_team_id" class="mr-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                            <div>{{ team.name }}</div>
                                                        </div>
                                                    </jet-dropdown-link>
                                                </form>
                                            </template>

                                            <div class="border-t border-gray-100"></div>
                                        </template>

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <jet-dropdown-link as="button">
                                                Logout
                                            </jet-dropdown-link>
                                        </form>
                                    </template>
                                </jet-dropdown>
                            </div>
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

    export default {
        name: "ToolBar",
        components: {
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
            path() {
                return window.location.pathname
            }
        }
    }
</script>

<style scoped>

</style>
