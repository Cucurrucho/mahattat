<template>
    <div class="box">
        <a :href="`posts/${post.id}`">
            <article class="media">
                <figure class="media-left">
                    <img :src="post.thumbnail">
                </figure>
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong v-text="post.title"></strong>
                            <br>
                            {{post.summary}}
                        </p>
                    </div>
                </div>
            </article>
        </a>
    </div>
</template>

<script>
    export default {
        name: "Post",
        props: {
            post: {
                type: Object,
                required: true
            }
        },
        methods: {
        }
    }
</script>

<style scoped>
    .box {
        box-shadow: 0px 14px 54px -1px rgba(105,104,105,1);
        max-width: 700px;
    }
    .media-content {
        text-align: right;
    }
    a:link    {color:#000;}  /* unvisited link  */
    a:visited {color:#000;}  /* visited link    */
    a:hover   {color:#000;}  /* mouse over link */
    a:active  {color:#000;}  /* selected link   */
    @media screen and (max-width: 1023px) {
        .media-content {
            margin-right: 5px;
        }
        .box {
            margin: 10px;
        }
    }
    img {
        max-width: 150px;
        max-height: 150px;
    }
</style>