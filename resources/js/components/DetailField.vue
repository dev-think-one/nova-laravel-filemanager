<template>
    <panel-item :field="field" >
        <template slot="value">
            <img
                v-if="field.value"
                :src="field.value"
                style="max-width: 200px; max-height: 200px; margin: 10px 10px 10px 0;"
            />
            <span v-else>
                -
            </span>
        </template>
    </panel-item>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>
