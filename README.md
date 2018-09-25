Base Template
================

| Branch | Build | Coverage |
---|---|---
| Master | [![Master Build Status](https://travis-ci.org/waynestate/base-site.svg?branch=master)](https://travis-ci.org/waynestate/base-site) | [![Coverage Status](https://coveralls.io/repos/github/waynestate/base-site/badge.svg?branch=master)](https://coveralls.io/github/waynestate/base-site?branch=master) |
| Develop | [![Develop Build Status](https://travis-ci.org/waynestate/base-site.svg?branch=develop)](https://travis-ci.org/waynestate/base-site) | [![Coverage Status](https://coveralls.io/repos/github/waynestate/base-site/badge.svg?branch=develop)](https://coveralls.io/github/waynestate/base-site?branch=develop) | 

Starter repository for creating a new website. Live demo can be found at https://base.wayne.edu/.

## Features

* Backend built on [Laravel v5.6](https://laravel.com/)
* Frontend built on [Tailwind](https://tailwindcss.com/)
* [Webpack](https://webpack.github.io/)
* Fluent webpack API using [Laravel Mix](https://laravel.com/docs/5.6/mix)
* Zero downtime deployment using [Envoy](https://laravel.com/docs/5.6/envoy)
* Configure multiple enviorments using [PHPDotenv](https://github.com/vlucas/phpdotenv)
* SCSS support
* Automatically inject JS/CSS while developing using [BrowserSync](https://browsersync.io/)
* [NewRelic](https://newrelic.com/) support via the `NewRelic` middleware if the php extension is installed
* [100% test code coverage](https://base.wayne.edu/coverages)
* [Public API documentation](https://base.wayne.edu/api)
* Commit hook that require the following to pass:
    * Tests using [PHPUnit](https://phpunit.de/)
    * PHP linting using [PHPCSFixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)
    * JS linting using [ESLint](http://eslint.org/)
    * CSS/SCSS linting using [Stylelint](https://stylelint.io/)
* Menus
    * Top level menu carried across all pages that follows you down the page as you scroll
    * Left menu if a page has subitems, otherwise its a full width page
    * Offcanvas menu that is triggered on a variable breakpoint that includes
        * The top level menu grouped together
        * Left menu
        * Under menu promotions
* [Full styleguide](https://base.wayne.edu/styleguide) detailing out every available component using [PHP faker data](https://github.com/fzaninotto/Faker)
* [Single](https://base.wayne.edu/styleguide/hero/full) or [rotating](https://base.wayne.edu/styleguide/hero/full/rotate) hero images using [Flickity](https://flickity.metafizzy.co/)
* Automatically lightbox youtube videos using [Media Box](https://github.com/pinceladasdaweb/mediabox)
* Easy integration with a CMS by writing [custom .json files](https://base.wayne.edu/index.json) to the public directory which are matched by to a route and sent to the specified controller

## Setup

1. Setup laravel homestead: http://laravel.com/docs/homestead
1. Clone the repository
1. run `make install`
1. run `make build`
1. run `make watch`
1. open https://domain.local:3000/ (for BrowserySync)

## Deployment

* Setup the following config variables in `Envoy.blade.php`
    * `$appname`
    * `$server_map`
    * `$source_repo`
    * `$deploy_basepath`
* Development: `envoy run deploy` or `make deploy`
* Production: `envoy run deploy --on="production"` or `make deployproduction`
* Any branch: `envoy run deploy --branch=feature/feature`

## Run tests

    phpunit

## Run test coverage

1. `make coverage`
2. Open the coverages/index.html file in your browser

## Check for outdated packages

    make status

## Update packages

    make update

## Configure the site

1. Open `/config/base.php`
1. Edit the options to configure the site, some values are present in the `.env` file.
1. Server specific configuration options come from the `.env` file which need to be manually created/updated on the servers the app is deployed to.

## Request API key

Email web@wayne.edu with your request.

## Developing global data that is passed down to all views via the `$request->data` variable

1. Open the folder `/app/Repositories`.
1. Create new class and implement the interface `RequestDataRepositoryContract`.
1. Fill out the `getRequestData` method and return an array.
1. Call the `getRequestData` method in the `/app/Http/Middleware/Data.php` file.

### Developing controllers

1. Open the folder `/app/Http/Controllers/`
1. This folder contains all the selectable templates from the CMS.
1. Controllers should:
    * Dependency inject repositories into the constructor.
    * Call repositories to obtain data to send to the view.

## Developing views

1. Open `/resources/views/`
1. This folder contains all the views for the front-end using the [blade templating engine](https://laravel.com/docs/5.6/blade)
1. Files must be saved in the format of: `homepage.blade.php`
1. Components: Contains views that are reusable

## Pages

Pages are written from the content management system automatically. To replicate what it writes you can use the following JSON format to create pages. Example homeage: `storage/app/public/index.json`.

```
{
    "site" : {
        "id" : 1,
        "title" : "Base Site",
        "subsite-folder" : null,
        "parent" : {
            "id" : null
        }
    },
    "page" : {
        "id" : 1,
        "controller" : "HomepageController",
        "title" : "Welcome!",
        "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed turpis lorem, malesuada eu tellus vel, pharetra consequat lacus. Vestibulum eu metus nec massa viverra iaculis. Pellentesque libero eros, varius non sem et, dapibus aliquam magna. Praesent ultri",
        "content" : {
            "main" : "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed turpis lorem, malesuada eu tellus vel, pharetra consequat lacus. Vestibulum eu metus nec massa viverra iaculis. Pellentesque libero eros, varius non sem et, dapibus aliquam magna.</p>"
        },
        "keywords" : "",
        "updated-at" : "",
        "canonical" : ""
    },
    "menu" : {
        "id" : 1
    },
    "data" : {

    }
}
```

## Menus

Menus are automatically pulled from the content management system. To replicate the structure you can use the following array and replace the code in `App\Repositories\MenuRepository@getAllMenus`.

```
<?php

$menus = [
    1 => [ // The menu_id specified from the .json file
        1 => [ // First menu item
            'menu_item_id' => '1', // Auto incrementing ID
            'is_active' => '1', // To output the menu item or not
            'page_id' => '1', // Page ID specified from the .json file
            'target' => '', // HTML <a target="">
            'display_name' => 'Home', // Title of the menu item
            'class_name' => '', // CSS class name to be appended to the menu item
            'relative_url' => '/', // The relative URL to this page
            'submenu' => [], // Subitems, follow same structure and include another submenu => []
        ],
        2 => [ // Second menu item...

        ],
    ],
];
```

## News listing & view

1. Create a CMS page called `news` in the root of the site and select the `NewsController` as the template.
1. This will handle both the listing & view for this particular site. If you need news for a subsite, follow #1 while being within that subsite.

## Profile listing & view

1. Create a CMS page for the profile listing page (ex: `profiles`) and select the `ProfileController` as the template.
1. Create a CMS page for the profile view, it must be: `profile` and select the `ProfileController` as the template.
1. You can now visit `https://domain.dev/profiles` and `http://domain.dev/profile/{accessid}`.

## Style guide development for a new feature

Feature names should be singular and CamelCased. To create a new feature called "Spotlight": `php artisan base:feature Spotlight`

## Adding SVG icons

1. Load the fontello-config.json file into http://fontello.com/
1. Select the new icons and download the set.
1. Load the waynestate.svg file into https://icomoon.io/app/#/select
1. Select all the icons and download the set.
1. Open the new SVG icon(s) in the editor of your choice.
1. Save each file under resources/views/svg as a blade partial.
1. Remove the comment from the svg file.
1. Apply this code to the svg tag: `class="{{ $class ?? '' }}" aria-labelledby="{{ $name ?? '' }}"`.

## Lazy loading

1. For <img> replace with: `@image('/path/to/image.jpg', 'alt text', 'optional classes')`
1. For background images: `<div data-src="/path/to/image.jpg"></div>`

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Licensing

Base Template is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
