<template>
  <div class="mb-30 text-xl">
    <div class="flex justify-items-start mb-10">
      <img src="assets/ikke2.jpg" alt="" class="max-w-sm w-48 rounded-2xl" />
      <div class="flex flex-col ml-8">
        <h1>Moin, I'm Mathias!</h1>
        <p class="text-2xl leading-loose">
          I'm a Senior Fullstack Software Developer from Hamburg, Germany.
          I love solving problems and working with people to do that. <br />
        </p>
      </div>
    </div>
    <div>
      <div v-for="category of Object.keys(skills)" v-bind:key="category">
        <h2 class="mt-20 mb-6 text-3xl">{{category}}</h2>
        <div class="flex flex-row justify-start">
          <div v-for="skill of skills[category]" v-bind:key="skill.name" class="flex flex-row items-center text-3xl">
            <img v-if="skill.img" :src="'assets/skills/' + skill.img" alt="" class="mr-2 max-w-12 max-h-12">
            <div class="inline-block">{{ skill.name }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { defineComponent } from "vue";

  export default defineComponent({
    name: "About",
    data: () => {
      return {
        skills: {
          backend: [
            { name: 'Typescript', img: 'typescript.png' },
            { name: 'Node.js', img: 'nodejs.png' },
            { name: 'serverless', img: 'serverless.svg' },
            { name: 'AWS', img: 'aws.jpg' },
          ],
          frontend: [
            { name: 'Vue.js', img: 'vuejs.svg' },
            { name: 'HTML5', img: 'html5.png' },
            { name: 'CSS3', img: 'css3.png' },
            { name: 'SASS', img: 'sass.png' },
            { name: 'Bootstrap', img: 'bootstrap.png' },
          ],
          tools: [
            { name: 'IntelliJ', img: 'intellij.svg' },
            { name: 'Postman', img: 'postman.svg' },
            { name: 'Github', img: 'github.png' },
          ],
          practices: [
            { name: 'TDD' },
            { name: 'Serverless' },
            { name: 'CI / CD' },
          ]
        }
      }
    },
  })
</script>

<style lang="postcss">
    .skill-container .skill-header {
        @apply flex flex-row flex flex-row items-center
    }

    .skill-container .skill-header img {
        @apply mr-2
    }
</style>
