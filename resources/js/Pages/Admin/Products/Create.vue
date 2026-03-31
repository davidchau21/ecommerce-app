<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    categories: Array,
});

const form = useForm({
    name: '',
    description: '',
    price: '',
    stock: '',
    category_id: '',
    image_url: 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1000', // Default placeholder
});

const submit = () => {
    form.post(route('admin.products.store'));
};
</script>

<template>
    <Head title="Create Product" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-end">
                <div>
                    <h2 class="text-4xl font-black text-slate-900 tracking-tight leading-none">New Product</h2>
                    <p class="text-[10px] uppercase font-black tracking-widest text-slate-400 mt-4 italic">Adding to the curated collection</p>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-3xl px-6 lg:px-8">
                <div class="premium-card p-12">
                    <form @submit.prevent="submit" class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="col-span-2">
                                <InputLabel for="name" value="Product Name" />
                                <TextInput
                                    id="name"
                                    type="text"
                                    v-model="form.name"
                                    required
                                    autofocus
                                    placeholder="Executive Desk Lamp"
                                />
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>

                            <div class="col-span-2">
                                <InputLabel for="description" value="Description" />
                                <div class="tonal-surface p-1">
                                    <textarea
                                        id="description"
                                        v-model="form.description"
                                        class="w-full bg-white rounded-lg border-none focus:ring-2 focus:ring-blue-600 p-4 min-h-[150px]"
                                        placeholder="Detailed item description..."
                                    ></textarea>
                                </div>
                                <InputError class="mt-2" :message="form.errors.description" />
                            </div>

                            <div>
                                <InputLabel for="price" value="Price ($)" />
                                <TextInput
                                    id="price"
                                    type="number"
                                    step="0.01"
                                    v-model="form.price"
                                    required
                                    placeholder="299.00"
                                />
                                <InputError class="mt-2" :message="form.errors.price" />
                            </div>

                            <div>
                                <InputLabel for="stock" value="Initial Stock" />
                                <TextInput
                                    id="stock"
                                    type="number"
                                    v-model="form.stock"
                                    required
                                    placeholder="50"
                                />
                                <InputError class="mt-2" :message="form.errors.stock" />
                            </div>

                            <div class="col-span-2">
                                <InputLabel for="category_id" value="Category" />
                                <div class="tonal-surface p-1">
                                    <select
                                        id="category_id"
                                        v-model="form.category_id"
                                        class="w-full bg-white rounded-lg border-none focus:ring-2 focus:ring-blue-600 p-4 font-medium text-slate-900"
                                        required
                                    >
                                        <option value="" disabled>Select a category</option>
                                        <option v-for="cat in categories" :key="cat.id" :value="cat.id">
                                            {{ cat.name }}
                                        </option>
                                    </select>
                                </div>
                                <InputError class="mt-2" :message="form.errors.category_id" />
                            </div>
                        </div>

                        <div class="pt-8 border-t border-slate-100 flex justify-end gap-4">
                            <button
                                type="button"
                                @click="$inertia.get(route('admin.products.index'))"
                                class="text-[10px] uppercase font-black tracking-widest text-slate-400 hover:text-slate-900 transition-colors"
                            >
                                Cancel
                            </button>
                            <PrimaryButton
                                class="px-12 py-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Publish Product
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
