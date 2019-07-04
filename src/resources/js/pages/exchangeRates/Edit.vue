<template>
    <div class="columns is-centered">
        <div class="column is-one-third-desktop is-half-tablet">
            <enso-form class="box form-box has-background-light raises-on-hover"/>
        </div>
    </div>
</template>

<script>
import { EnsoForm } from '@enso-ui/bulma';

export default {
    name: 'Edit',

    components: { EnsoForm },
};
</script>

<style lang="scss">
</style>
