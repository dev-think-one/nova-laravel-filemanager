<template>
    <default-field :field="field" :errors="errors" :show-help-text="showHelpText">
        <template slot="field">
            <div v-if="value">
                <img
                    :src="value"
                    style="max-width: 200px; max-height: 200px; margin: 10px 10px 10px 0;"
                />
            </div>
            <!--<input
                :id="field.name"
                type="text"
                class="w-full form-control form-input form-input-bordered"
                :class="errorClasses"
                :placeholder="field.name"
                v-model="value"
            />-->
            <button
                @click.prevent="selectImage"
                class="btn btn-default btn-primary inline-flex items-center relative mr-3">
                Select
            </button>
        </template>
    </default-field>
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
        /*
         * Set the initial, internal value for the field.
         */
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
