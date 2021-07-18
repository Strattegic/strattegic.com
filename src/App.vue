<template>
  <div class="flex flex-col h-screen justify-between bg-white dark:bg-gray-800 dark:text-white">
    <div class="container mx-auto my-8 lg:w-9/12">
      <header class="flex items-end">
        <span class="mr-5 bg-blue-100 p-2 text-white">STR</span>
        <nav class="text-3xl mb-1">
          <router-link to="/" class="mx-5">about.</router-link>
          <router-link to="/projects" class="mx-5">projects.</router-link>
        </nav>
      </header>
      <div class="mt-32">
        <router-view />
      </div>
    </div>

    <footer class="border-t border-black">
      <div class="container mx-auto my-4 lg:w-10/12">
        <div class="flex justify-center items-center">
          <a href="https://github.com/Strattegic" class="m-5 border-b-0">
            <CompanyIcon type="github" />
          </a>
          <a href="https://github.com/Strattegic" class="m-5 border-b-0 hover:transform hover:translate-x-2 hover:scale-50">
            <CompanyIcon type="linkedin" />
          </a>
        </div>
      </div>
    </footer>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import CompanyIcon from "@/components/CompanyIcon.vue";

export default defineComponent({
  name: "App",
  components: {
    CompanyIcon
  },
  data: () => {
    return {
      footerItems: [
        {
          title: 'E-Mail',
          text: 'm.strathausen@gmail.com',
        },
        {
          title: 'Github',
          text: '@strattegic',
          url: 'https://github.com/Strattegic',
        },
        {
          title: 'LinkedIn',
          text: 'strattegic',
          url: ' www.linkedin.com/in/strattegic',
        }
      ]
    }
  }
});
</script>

<style lang="postcss">
  .dev-item::before {
    content: "▹";
    @apply text-xl leading-6 text-orange mr-1;
  }

  .dev-item {
    @apply text-lg leading-8
  }

  ul {
    @apply list-none m-0
  }
</style>
