const RateCreate = () => import('../../../pages/exchangeRates/Create.vue');

export default {
    name: 'administration.exchangeRates.create',
    path: 'create',
    component: RateCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Exchange Rate',
    },
};
