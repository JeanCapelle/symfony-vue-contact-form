<template>
    <div>
        <div class="row col">
        </div>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">
                    <form >
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3><i class="fa fa-envelope"></i> Contact</h3>
                                    <p class="m-0">Posez votre question</p>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="nom"  placeholder="Nom" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="prenom"  placeholder="Prénom" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="tel"  placeholder="Téléphone" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="email"  placeholder="Email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <textarea v-model="message" class="form-control" placeholder="votre question" required></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <!-- <input type="submit" value="Envoyer" class="btn btn-info btn-block rounded-0 py-2"> -->
                                                        <button @click="createUser()" :disabled="message.length === 0 ||
                         isLoading" type="button" class="btn btn-primary">Create</button>
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>
</div>
    </div>
</template>

<script>
    import Post from '../components/Post';
    import User from '../components/User';

    export default {
        name: 'home',
        components: {
            // Post,
            // User,
        },
        data () {
            return {
                message: '',
            };
        },
        methods: {
            createUser () {
                console.log(this.$data.message);
                // this.$store.dispatch('user/createUser', this.$data.message)
                //     .then(() => this.$data.message = '')
                this.$store.dispatch('post/createPost', this.$data.message)
                    .then(() => this.$data.message = 'Succes')
            },
        },
    }
</script>