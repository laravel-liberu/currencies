const CurrencyIndex = () => import('../../../pages/currencies/Index.vue');

export default {
    name: 'administration.currencies.index',
    path: '',
    component: CurrencyIndex,
    meta: {
        breadcrumb: 'index',
        title: 'Currencies',
    },
};
