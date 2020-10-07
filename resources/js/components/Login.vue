<template>
     <div class="container">
        <div class="row justify-content-center">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" name="email" v-model="email" placeholder="Email" type="email" class="form-control" autocomplete="off" required autofocus>
                                
                                <!-- @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"  class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" v-model="password" type="password" class="form-control" name="password" placeholder="must be 6 charecter" autocomplete="off" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" v-model="remember" id="remember">

                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" @click="tryLogin()" :disabled="!isValidLoginForm" class="btn btn-primary">
                                    Login
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- footer for social login -->
                    <small v-if="errors.email" class="text-danger">*{{ errors.email[0] }}</small>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            email:'',
            password:'',
            remember:true,
            errors:{}
        }
        
    },
    computed:{
        isValidLoginForm(){
            return this.isEmailValid() && this.isPasswordValid();
        }
    },
    methods:{
         isEmailValid() 
        {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))
            {
                return true;
            }else{
                return false;
            }
                
        },
        isPasswordValid(){
            if(this.password.length >= 6){
                return true;
            }else{
                return false;
            }
        },
        tryLogin(){
            axios.post('/login',{
                email: this.email,
                password: this.password,
                remember: this.remember
            })
            .then(response => {
                // reload same page
                if(response.data.isAdmin){
                    window.location.href = '/admin';
                    
                }else{
                    window.location.reload();
                }
                
                // console.log(response.data.isAdmin);
                
                
            })
            .catch(error => {
                // console.log(error);
                this.errors = error.response.data.errors;
            })
        }

    },
    mounted(){
        
        
    }

}
</script>

<style>

</style>
