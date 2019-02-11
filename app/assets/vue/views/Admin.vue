<template>
    <div>
        <div class="row col">
            <h1>Liste des demandes</h1>
        </div>
    
        <div v-if="isLoading" class="row col">
            <p>Loading...</p>
        </div>
    
        <div v-else-if="hasError" class="row col">
            <error-message :error="error"></error-message>
        </div>
    
        <div v-else-if="!hasPosts" class="row col">
            Pas de demande des clients
        </div>
    
    
        <div v-else v-for="post in posts" class="row col">
            <post :message="post.message" :dateCreated="post.created" :checked="post.checked" :user="post.user"></post>
        </div>
    
    </div>
</template>

<script>
import Post from '../components/Post';
import ErrorMessage from '../components/ErrorMessage';

export default {
    name: 'Admin',
    components: {
        Post,
        ErrorMessage,
    },
    data() {
        return {
            message: '',
            post: '',

        };
    },
    created() {
        this.$store.dispatch('post/fetchPosts');
    },
    computed: {
        isLoading() {
            return this.$store.getters['post/isLoading'];
        },
        hasError() {
            return this.$store.getters['post/hasError'];
        },
        error() {
            return this.$store.getters['post/error'];
        },
        hasPosts() {
            return this.$store.getters['post/hasPosts'];
        },
        posts() {
            return this.$store.getters['post/posts'];
        },
    },
    methods: {
        updateChecked() {
            this.$store.dispatch('post/createUser', this.$data.user);
        }
    },
}
</script>