<template>
    <h1>Projects</h1>
    <p>I love to try out new technologies and explore different ideas. Some of the </p>

    <h2 class="flex flex-row items-end"><span class="mr-2">Cinagree</span> <a href="border-0"><CompanyIcon type="github" /></a></h2>
    <p class="hint">a fun application that lets a group of people choose the right flick for movie night</p>
    Status: In early development
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