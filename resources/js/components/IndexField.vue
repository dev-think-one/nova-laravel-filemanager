<template>
    <div>
        <img
            v-if="field.value"
            :src="field.value"
            style="max-width: 100px; max-height: 100px; margin: 10px 10px 10px 0;"
        />
        <span v-else>
            -
        </span>
    </div>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
}
</script>
