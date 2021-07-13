<template>
  <div class="container mx-auto my-8 lg:w-10/12">
    <header class="flex items-end">
      <span class="mr-3 bg-yellow-500 p-2 text-white">STR</span>
      <nav>
        <a href="" class="mx-3 text-2xl" v-for="name of ['about', 'projects']" v-bind:key="name">{{name}}</a>
      </nav>
    </header>
    <div class="my-20 text-xl">
      <h1 class="font-serif font-bold text-6xl mb-6">Moin, I'm Mathias!</h1>
      <p>
        I'm a Senior Fullstack Developer from Hamburg, Germany.
      </p>
    </div>
    <footer class="flex">
      <a v-bind:href=item.url class="mx-3" v-for="item of footerItems" v-bind:key="item.title">
        {{ item.text }}
      </a>
    </footer>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "App",
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
#app {
  /*font-family: Avenir, Helvetica, Arial, sans-serif;*/
  /*-webkit-font-smoothing: antialiased;*/
  /*-moz-osx-font-smoothing: grayscale;*/
}
</style>
