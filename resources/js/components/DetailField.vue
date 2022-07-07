<template>
  <PanelItem :index="index" :field="field">
    <template #value>
      <img
          v-if="field.value"
          :src="field.value"
          style="max-width: 200px; max-height: 200px; margin: 10px 10px 10px 0;"
      />
      <span v-else>
                -
            </span>
    </template>
  </PanelItem>
</template>

<script>
export default {
  props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
}
</script>
