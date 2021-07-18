import { createWebHistory, createRouter } from "vue-router";
import About from "@/components/About.vue";
import Projects from "@/components/Projects.vue";

const routes = [
  {
    path: "/",
    name: "About",
    component: About,
  },
  {
    path: "/projects",
    name: "Projects",
    component: Projects,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
