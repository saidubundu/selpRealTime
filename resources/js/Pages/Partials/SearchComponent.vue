<template>
    <div class="tt-search">
        <!-- toggle -->
        <button class="tt-search-toggle" data-toggle="modal" data-target="#modalAdvancedSearch">
            <svg class="tt-icon">
                <use xlink:href="#icon-search"></use>
            </svg>
        </button>
        <!-- /toggle -->
        <form class="search-wrapper">
            <div class="search-form">
                <input v-model="query" type="text" class="tt-search__input" placeholder="Search">
                <button class="tt-search__btn" type="submit">
                    <svg class="tt-icon">
                        <use xlink:href="#icon-search"></use>
                    </svg>
                </button>
                <button class="tt-search__close">
                    <svg class="tt-icon">
                        <use xlink:href="#cancel"></use>
                    </svg>
                </button>
            </div>
            <div class="search-results">
                <div class="tt-search-scroll">
                    <ul v-if="results.length > 0 && query">
                        <li v-for="result in results.slice(0,10)" :key="result.id">
                                <inertia-link :href="result.url">
                                <h6 class="tt-title">{{result.title}}</h6>
                                </inertia-link>

                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "SearchComponent",
        data() {
            return {
                query: null,
                results: []
            };
        },

        watch: {
            query(after, before) {
                this.searchMembers();
            }
        },

        methods: {
            searchMembers() {
                axios.get('/api/search', {params: {query: this.query}})
                    .then(response => this.results = response.data)
                    .catch(error => {
                    });
            }
        }
    }
</script>

<style scoped>

</style>
