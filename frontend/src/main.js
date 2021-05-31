import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'

import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import "bootstrap-icons/font/bootstrap-icons.css"

//route konfiguráció importálása
import RouteConfig from './config/routes.js'
import axios from 'axios'

//route indítása
const router = new VueRouter({
    routes: RouteConfig
});

//A VueResource, VueRouter használatba vétele
Vue.use(VueRouter);


Vue.config.productionTip = false

Vue.mixin({
    data(){
        return{
            url: "http://localhost/Bolt/backend/backend.php"
        }
    }
});

let x = new Vue({
    router: router,
    render: h => h(App),
    data(){
        return {
            loginAccessLevel: null,
            loginUserName: null
        }
    },
    created(){
        this.getUserName()
    },
    methods: {
        getUserName(){
            axios
            .get(this.url, {
                params: {
                    query: "getUser"
                }
            })
            .then((res) => {
                this.loginAccessLevel = res.data.loginAccessLevel;
                this.loginUserName = res.data.loginUserName;
                console.log("App.vue", res.data);
            })
            .catch((error) => {
                console.log(error);
            });
        },
    },
}).$mount('#app')


router.beforeEach((to,from,next) =>{
    x.getUserName();
    let loggedIn = x.$data.loginUserName
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!loggedIn) {
            next({
                path: '/bejelentkezes'
            })
        }else{
            next()
        }
    }else{
        next()
    }
});