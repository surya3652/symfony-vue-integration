import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        name: "App",
        component: () => import("./App.vue")
    },
    {
        path: "/post-form",
        name: "post",
        component: () => import("./Form.vue")
    },
]

const router = new VueRouter({
    mode: "history",
    routes
})

