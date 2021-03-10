<template>
    <tr scroll-region>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            {{ post.name }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ post.slug }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ post.content.substr(0,20) }}...
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            <!-- Publié: bg-indigo-600 | Non publié: bg-gray-200 -->
            <button @click="toggle" type="button"  :class="[post.published ? 'bg-indigo-600' : 'bg-gray-200' ]" class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-pressed="false">
                <span class="sr-only">Use setting</span>
                <!-- Publié: "translate-x-5", Non publié: "translate-x-0" -->
                <span aria-hidden="true"  :class="[post.published ? 'translate-x-5' : 'translate-x-0' ]" class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
            </button>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <inertia-link :href="route('blog.edit', post.id)" class="text-indigo-600 hover:text-indigo-900">Editer</inertia-link>
            <a href="#" class="ml-4 text-indigo-600 hover:text-indigo-900">Supprimer</a>
        </td>
    </tr>
</template>

<script>
export default {
    props: ['post'],

    methods: {
        toggle() {
            this.$inertia.visit(this.route('blog.toggle', this.post.id), {
                preserveScroll: true,
                preserveState: true,
            });
        }
    }
}
</script>
