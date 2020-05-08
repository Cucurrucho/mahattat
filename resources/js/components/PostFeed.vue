<template>
    <div class="columns is-centered is-vcentered">
        <div class="column is-half-fullhd is-four-fifths">
            <post v-for="post in posts" :key="post.id" :post="post">
            </post>
            <observer @intersect="intersected"/>
        </div>
    </div>
</template>

<script>
    import Observer from "./Observer";
    import Post from './Post';

    export default {
        name: "PostFeed",
        components: {
            Observer,
            Post
        },
        data() {
            return {
                posts: [],
                page: 1
            }
        },
        methods: {
            async intersected() {
                const params = new URLSearchParams(window.location.search);
                let url = `posts/?page=${this.page}`;
                if (params.has('searchWord')) {
                    url += '&searchWord=' + params.get('searchWord');
                }
                const res = await axios.get(url);
                const posts = await res.data.data;
                if (posts.length > 0) {
                    this.page++;
                    this.posts = [...this.posts, ...posts];
                }


            }
        }
    }
</script>
<style scoped>

</style>
