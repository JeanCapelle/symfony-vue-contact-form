<template>
    <div>
        <div class="row col">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 pb-5">
                    <form>
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
                                        <input type="text" class="form-control" v-model="form.firstname" placeholder="Nom" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" v-model="form.lastname" placeholder="Prénom" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" v-model="form.phone" placeholder="Téléphone" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" v-model="form.email" placeholder="Email" required>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <textarea v-model="form.message" class="form-control" placeholder="votre question"></textarea>
                                    </div>
                                </div>
    
                                <div class="text-center">
                                    <button @click="createUser()" :disabled="form.message.length === 0 ||
                             isLoading" type="button" class="btn btn-primary">Envoyer</button>
                                    <div  v-if="!hidden" class="p-3 mb-2 bg-success text-white">Demande envoyée</div>
                                </div>
                            </div>
    
                        </div>
                    </form>
    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Post from '../components/Post';

export default {
    name: 'home',
    components: {

    },
    data() {
        return {
            hidden: true,
            form: {
                firstname: '',
                lastname: '',
                email: '',
                phone: '',
                message: '',
            }
        };
    },
    methods: {
        createUser() {
            this.$store.dispatch('user/createUser', this.$data.form).
            then(
                () => console.log( this.hidden = false )
            )

        },
    },
}
</script>