import routeImporter from '@core-modules/importers/routeImporter';

const routes = routeImporter(require.context('./exchangeRates', false, /.*\.js$/));
const RouterView = () => import('@core-pages/Router.vue');

export default {
    path: 'exchangeRates',
    component: RouterView,
    meta: {
        breadcrumb: 'echange rates',
        route: 'administration.exchangeRates.index',
    },
    children: routes,
};
