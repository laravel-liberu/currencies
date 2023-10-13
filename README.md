# Currencies

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/231c10ed999f4dfd98d9def61c1e6f7e)](https://www.codacy.com/gh/laravel-liberu/currencies?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=laravel-liberu/currencies&amp;utm_campaign=Badge_Grade) 
[![StyleCI](https://github.styleci.io/repos/194647672/shield?branch=master)](https://github.styleci.io/repos/194647672)
[![License](https://poser.pugx.org/laravel-liberu/currencies/license)](https://packagist.org/packages/laravel-liberu/currencies)
[![Total Downloads](https://poser.pugx.org/laravel-liberu/currencies/downloads)](https://packagist.org/packages/laravel-liberu/currencies)
[![Latest Stable Version](https://poser.pugx.org/laravel-liberu/currencies/version)](https://packagist.org/packages/laravel-liberu/currencies)

Currencies is an extension of the Laravel Liberu enviroment, 
designed for management of currencies and exchange rates.

**Note:** *The package cannot be used outside of Liberu enviroment and is not included in [Laravel Liberu Core](https://github.com/laravel-liberu/Core) packages.*

### Features
- handles CRUD operations for currencies and exchange rates
- manages the default currency for your project 
- exchange rates can be input for a given day
- comes with an included currencies seeder which can be published and further customized
- includes front-end assets

### Instalation
* install the package using composer: `composer require laravel-liberu/currencies`
* adds the following alias in `webackpack.mix.js`
```
.webpackConfig({
        resolve: {
            extensions: ['.js', '.vue', '.json'],
            alias: {
                 //other aliases
                '@currencies': `${__dirname}/vendor/laravel-liberu/currencies/src/resources/js`,
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


