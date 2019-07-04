<template>
    <span class="icon">
        <fa :icon="symbol"/>
    </span>
</template>

<script>
import { library } from '@fortawesome/fontawesome-svg-core';
import { faDollarSign, faEuroSign } from '@fortawesome/free-solid-svg-icons';
import faLeuSign from './icons/faLeuSign';

library.add(faLeuSign, faDollarSign, faEuroSign);

export default {
    name: 'Currency',

    props: {
        symbol: {
            type: Number,
            default: null,
        },
    },
};
</script>
