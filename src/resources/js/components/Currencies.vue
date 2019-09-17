<template>
    <a class="button is-warning"
        @click="next">
        <currency :symbol="currency.symbol"
            v-if="currency"/>
    </a>
</template>

<script>
import { mapState } from 'vuex';
import Currency from './Currency.vue';

export default {
    name: 'Currencies',

    components: { Currency },

    props: {
        value: {
            type: Number,
            default: null,
        },
    },

    computed: {
        ...mapState(['enums']),
        ...mapState('local', ['currencies']),
        default() {
            return this.currencies.find(({ isDefault }) => isDefault);
        },
        currency() {
            return this.currencies.find(({ id }) => id === this.value);
        },
        index() {
            return this.currencies.findIndex(({ id }) => id === this.value);
        },
    },

    created() {
        if (!this.value) {
            this.$emit('input', this.default.id);
        }
    },

    methods: {
        next() {
            const index = this.index === this.currencies.length - 1
                ? 0
                : this.index + 1;

            this.$emit('input', this.currencies[index].id);
        },
    },
};
</script>
