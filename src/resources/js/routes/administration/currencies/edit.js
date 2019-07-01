const CurrencyEdit = () => import('../../../pages/currencies/Edit.vue');

export default {
    name: 'administration.currencies.edit',
    path: ':currency/edit',
    component: CurrencyEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Currencies',
    },
};
