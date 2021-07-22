import { createWebHistory, createRouter } from "vue-router";
import About from "@/components/About.vue";
import Projects from "@/components/Projects.vue";
import Imprint from "@/components/Imprint.vue";

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
  {
    path: "/imprint",
    name: "Imprint",
    component: Imprint,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
