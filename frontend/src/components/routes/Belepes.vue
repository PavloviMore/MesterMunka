<template>
    <div class="container-fluid">
        <div class="row my-div text-center ">
            <h3>Bejelentkezés</h3>
            <form 
                class="needs-validation"
                novalidate
            >
                <div>
                    <input 
                        class="form-control form-control-lg m-1"
                        id="email" 
                        type="text"
                        placeholder="e-mail cím" 
                        v-model="email"
                        required
                    >
                    <div class="invalid-feedback">
                        Kötelező!
                    </div>
                </div>
                <div>
                    <input 
                        class="form-control form-control-lg m-1" 
                        id="password"
                        type="password"
                        placeholder="Jelszó"
                        v-model="password"
                        required
                    >
                    <div class="invalid-feedback">
                        Kötelező!
                    </div>
                </div>
                <button class="btn my-3" @click.prevent="onClickLogin">
                    Bejeletkezés
                </button>
            </form>

                <router-link to="/regisztracio/" class="m-1">Nincs fiókod?</router-link>
        </div>
</div>
</template>

<script>
const axios = require("axios").default;
const bootstrap = require("bootstrap");
axios.defaults.withCredentials = true;

export default {
    name:"belepes",
    data(){
        return {
            email: null,
            password: null,
            form: null,
            queryLogin: "loginUser",
        }
    },
    mounted() {
        this.form = document.querySelector(".needs-validation");
        this.modalWindow = new bootstrap.Modal(document.getElementById("Modal"));
    },
    methods:{
        onClickLogin(){
            this.form.classList.add("was-validated");
            if (this.form.checkValidity()) {
                //jó kitöltöttség
                this.loginUser();
            }
        },
        loginUser(){
            let params = {
                query: this.queryLogin,
                email: this.email,
                password: this.password,
            };
            axios
            .post(this.url, params)
            .then((res) => {
                console.log(res.data);
                this.$root.$data.loginAccessLevel = res.data.loginAccessLevel;
                this.$root.$data.loginUserName = res.data.loginUserName;
            })
            .catch((error) => {
                console.log(error);
            })
        }
    }
}
</script>

<style>
.my-div{
    width: 500px;
    margin: auto auto;
}

.btn{
    border: 2px solid gray;
    width: max-content;
    margin: auto auto;
}
</style>