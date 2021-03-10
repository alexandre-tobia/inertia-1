<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edition d'article
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <post-form :post="post" :errors="errors"/>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import PostForm from "@/Components/Post/PostForm";

export default {
    props: [
        'errors',
        'post'
    ],

    components: {
        PostForm,
        AppLayout,
    },
}
</script>
