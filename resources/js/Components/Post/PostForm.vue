<template>
    <jet-form-section @submitted="submitForm">
        <template #title>
            Création d'article
        </template>

        <template #description>
            Information de l'article
        </template>

        <template #form>
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Name"/>
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name"/>
                <jet-input-error :message="errors.name" class="mt-2"/>
            </div>

            <!-- Slug -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="slug" value="Slug"/>
                <jet-input id="slug" type="text" class="mt-1 block w-full" v-model="form.slug" autocomplete="slug"/>
                <jet-input-error :message="errors.slug" class="mt-2"/>
            </div>

            <!-- Content -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="content" value="Contenu"/>
                <textarea id="content" class="mt-1 block w-full" v-model="form.content"
                          autocomplete="content"></textarea>
                <jet-input-error :message="errors.content" class="mt-2"/>
            </div>

            <!-- Published -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="content" value="Publié ?"/>
                <button @click="toggle" type="button" :class="[form.published ? 'bg-indigo-600' : 'bg-gray-200' ]"
                        class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        aria-pressed="false">
                    <span class="sr-only">Use setting</span>
                    <!-- Publié: "translate-x-5", Non publié: "translate-x-0" -->
                    <span aria-hidden="true" :class="[form.published ? 'translate-x-5' : 'translate-x-0' ]"
                          class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                </button>
                <jet-input-error :message="errors.published" class="mt-2"/>
            </div>

        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";

export default {
    props: [
        'errors',
        'post'
    ],

    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetSecondaryButton,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: this.post ? this.post.name : '',
                slug: this.post ? this.post.slug : '',
                content: this.post ? this.post.content : '',
                published: this.post ? this.post.published : false
            })
        }
    },

    methods: {
        toggle() {
            this.form.published = !this.form.published;
        },
        submitForm() {
            if (this.post) {
                this.$inertia.put(this.route('blog.update', this.post.id), this.form);
            } else {
                this.$inertia.post(this.route('blog.store'), this.form);
            }
        }
    }
}
</script>
