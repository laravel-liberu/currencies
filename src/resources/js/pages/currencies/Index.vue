<template>
    <enso-table class="box is-paddingless raises-on-hover"
        id="currencies">
        <template v-slot:symbol="{ row }">
            <currency :symbol="row.symbol"/>
        </template>
    </enso-table>
</template>

<script>

import { EnsoTable } from '@enso-ui/bulma';
import Currency from '../../components/Currency.vue';

export default {
    name: 'Index',

    components: { EnsoTable, Currency },
};
</script>

<style lang="scss">
</style>
