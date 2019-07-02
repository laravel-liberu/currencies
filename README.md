# Currencies

[![StyleCI](https://github.styleci.io/repos/194647672/shield?branch=master)](https://github.styleci.io/repos/194647672)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/7c8421322ab94fc2a612bcf56bc0f294)](https://www.codacy.com/app/laravel-enso/currencies?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=laravel-enso/currencies&amp;utm_campaign=Badge_Grade)

Currencies package is an extesion of the Laravel Enso enviroment, designed for management of currencies and exchange rates.

**Note:** *This package cannot be used outside of enso enviroment and is not included in [Laravel Enso Core](https://github.com/laravel-enso/Core) packages.*

### Features
* adds crud operations for currencies
* adds crud operations for exchange rates
* manages default currency for your project
* comes with a common currencies seeder
* includes front-end assets

### Instalation
* install the package using composer: `composer require laravel-enso/currencies`
* adds the following alias in `webackpack.mix.js`
```
.webpackConfig({
        resolve: {
            extensions: ['.js', '.vue', '.json'],
            alias: {
                 //other aliases
                '@currencies': `${__dirname}/vendor/laravel-enso/currencies/src/resources/js`,
            },
        },
    })
```
* in `resources/js/router.js` file, verify that `RouteMerger` is imported, or import it

`import RouteMerger from '@core-modules/importers/RouteMerger';`

* make sure `routeImporter` is also imported

`import routeImporter from '@core-modules/importers/routeImporter';`

* then use `RouteMerger` to import front-end assets using the alias defined in `webpack.mix.js`

```
(new RouteMerger(routes))
    .add(routeImporter(require.context('./routes', false, /.*\.js$/)))
    .add(routeImporter(require.context('@currencies/routes', false, /.*\.js$/)));
```

* in `resources/js/app.js` import the package's icons

`import '@currencies/icons'`

* make sure `hot module replacement` is not active, and run `yarn dev` or `npm run dev`

### Publishes
* you can publish the currency seeder and customize it to your liking

`php artisan vendor:publish --tag=currency-seeder`

### Icons
The package uses the following icons:
* `coins`
* `bar-chart`

### Contributions

are welcome. Pull requests are great, but issues are good too.

### License

This package is released under the MIT license.


