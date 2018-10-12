<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Posts Component</div>
                <div class="card-body">

                    <div class="card card-body mb-2" v-for="post in posts" v-bind:key="post.id">
                        <h3>{{ post.title }}</h3>
                        <p v-html="post.body"></p>
                        <hr>
                        <button @click="editPost(post)" class="btn btn-warning mb-2 col-md-3">Edit</button>
                        <button @click="deletePost(post.id)" class="btn btn-danger col-md-3">Delete</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                posts: [],
                post: {
                    id: '',
                    title: '',
                    body: ''
                },
                post_id: '',
                pagination: {},
                edit: false
            };
        },
        created() {
            this.fetchPosts();
        },
        methods: {
            fetchPosts(page_url) {
                let vm = this;
                page_url = page_url || '/api/posts';
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    console.log(res.data);
                    this.posts = res.data;
                    //vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            deletePost(id) {
                alert('TBD: Post Removed');
            },
            editPost(post) {
                alert('TBD: Edit Post');
            },
        },
    }
</script>
