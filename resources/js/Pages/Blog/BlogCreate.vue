<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Création d'article
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <post-form :errors="errors"/>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import PostForm from "@/Components/Post/PostForm";

export default {
    props: [
        'posts',
        'errors'
    ],

    components: {
        PostForm,
        AppLayout,
    },
}
</script>
