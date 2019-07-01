const RateEdit = () => import('../../../pages/exchangeRates/Edit.vue');

export default {
    name: 'administration.exchangeRates.edit',
    path: ':exchangeRate/edit',
    component: RateEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Exchange Rate',
    },
};
