<template>
  <DefaultField :field="field" :errors="errors" :show-help-text="showHelpText">
    <template #field>
      <div v-if="value">
        <img
            :src="value"
            style="max-width: 200px; max-height: 200px; margin: 10px 10px 10px 0;"
        />
      </div>
      <default-button
          type="button"
          tabindex="0"
          @click.prevent="selectImage"
      >
        Select
      </default-button>
    </template>
  </DefaultField>
</template>

<script>
import {FormField, HandlesValidationErrors} from 'laravel-nova'

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ['resourceName', 'resourceId', 'field'],

  data() {
    return {
      value: null,
    };
  },

  methods: {
    setInitialValue() {
      this.value = this.field.value || ''
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.field.attribute, this.value || '')
    },

    selectImage() {
      let path = this.field.filemanager_path;
      window.open(path + '?type=image', 'FileManager', 'width=900,height=600');
      window.SetUrl = (items) => {
        if (items && items[0]) {
          this.value = items[0].url;
        } else {
          this.value = null;
        }
      };
    }
  },
}
</script>
