<template>
    <div class="card w-100 mt-2">
        <div class="card-body">
            <div class="row">
                <div class="col-10">{{message}}</div>
                <div class="col-sm">
                    <button type="button" @click="updateChecked(user)" class="btn btn-primary">{{checked}}</button>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
    
                <div class="col-9">
                    <small class="text-muted">{{user.lastname}} {{user.firstname}} {{user.email}}</small>
                </div>
                <div class="col-sm">
                    <small class="text-muted">{{dateCreated}}</small>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Post from '../components/Post';

export default {
    name: "post",
    mounted() {
        let userId = "this.user.id;"
    },
    methods: {
        updateChecked(user) {
            this.$store.dispatch('post/updateChecked', user.id);

        },
    },

    props: ["message", "dateCreated", "checked", "user"]
}
</script>