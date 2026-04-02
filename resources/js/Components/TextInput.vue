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
    <div class="tonal-surface">
        <input
            class="w-full px-5 py-4 bg-surface-container-high border-none rounded-lg focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all duration-200 outline-none text-on-surface placeholder:text-on-surface-variant/40"
            v-model="model"
            ref="input"
        />
    </div>
</template>
