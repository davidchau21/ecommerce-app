<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <div class="tonal-surface p-1">
        <input
            class="w-full bg-white rounded-lg border-none focus:ring-2 focus:ring-blue-600 p-4 font-medium text-slate-900 transition-all placeholder:text-slate-300"
            v-model="model"
            ref="input"
        />
    </div>
</template>
