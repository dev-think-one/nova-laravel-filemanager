<template>
  <div>
    <Head title="Price Tracker"/>

    <Heading class="mb-6">{{ __('filemanager.title') }}</Heading>
    <div class="flex justify-end">
      <nav
          v-if="types.length > 1"
          class="mb-4 font-bold rounded-lg overflow-hidden isolate flex divide-x divide-gray-200  shadow" aria-label="Tabs">
        <a
            v-for="type in types"
            @click.prevent="selectedType=type"
           :class="[
             selectedType===type
             ? 'bg-primary-500 text-gray-200'
             : 'cursor-pointer bg-gray-200 dark:bg-gray-900 text-primary-500'
         ]"
           class="w-48 group relative min-w-0 flex-1 py-4 px-4 text-center text-sm focus:z-10">
          <span>{{ __(`filemanager.${type}`) }}</span>
        </a>
      </nav>
    </div>
    <Card
        class="overflow-hidden rounded-sm"
        style="min-height: 450px"
        :style="{height: `${blockHeight}px`}"
    >
      <iframe
          v-if="url"
          ref="iframe"
          class="w-full h-full"
          :src="url"
          tabindex="-1"
      />
    </Card>
  </div>
</template>

<script setup>
import {ref, computed, onMounted} from 'vue';

const iframe = ref(null);
const blockHeight = ref(0);
const selectedType = ref('');
const types = computed(() => {
  return Nova.config('novaLaravelFileManager')?.types || [];
});
const url = computed(() => {
  if(selectedType.value) {
    return Nova.config('novaLaravelFileManager')?.url?.replace('_TYPE_', selectedType.value);
  }
  return null;
});


const resizeIframe = () => {
  if(iframe.value) {
    blockHeight.value = iframe.value?.contentWindow?.document?.body?.scrollHeight || 0;
  }
}

onMounted(() => {
  if(types.value.length) {
    selectedType.value =types.value[0]
  }
  resizeIframe();
  setInterval(resizeIframe, 1000)
})

</script>

<style>
/* Scoped Styles */
</style>
