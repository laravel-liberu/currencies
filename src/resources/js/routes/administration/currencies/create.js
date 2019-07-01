const CurrencyCreate = () => import('../../../pages/currencies/Create.vue');

export default {
    name: 'administration.currencies.create',
    path: 'create',
    component: CurrencyCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Currencies',
    },
};
