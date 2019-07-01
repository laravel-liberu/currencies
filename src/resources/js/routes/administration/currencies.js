import routeImporter from '@core-modules/importers/routeImporter';

const routes = routeImporter(require.context('./currencies', false, /.*\.js$/));
const RouterView = () => import('@core-pages/Router.vue');

export default {
    path: 'currencies',
    component: RouterView,
    meta: {
        breadcrumb: 'currencies',
        route: 'administration.currencies.index',
    },
    children: routes,
};
