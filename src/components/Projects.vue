<template>
    <h1>Projects</h1>
    <p>I love to try out new technologies and explore different ideas. Some of the projects I recently worked on you can see here.</p>

    <div class="flex mt-6">
        <div class="project">
            <h2 class="flex flex-row items-center justify-between mt-0"><span class="">Cinagree</span> <a href="border-0"><CompanyIcon type="github" /></a></h2>
            <p class="hint text-block text-justify">A fun application that lets a group of people choose the right flick for movie night.</p>
            Status: <span class="text-yellow-500">In early development</span>
        </div>
    </div>

</template>
<script>
    import {defineComponent} from "vue";
    import CompanyIcon from "@/components/CompanyIcon";

    export default defineComponent({
        name: "Projects",
        components: {
            CompanyIcon
        },
    })
</script>
<style lang="postcss">
    .project {
        width: 33%;
        @apply bg-white border rounded-xl text-black px-6 py-5
    }

    .project a {
        @apply border-0
    }

    .project svg {
        @apply dark:text-black
    }
</style>